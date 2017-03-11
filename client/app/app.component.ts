import {Component, OnInit} from '@angular/core';
import {Candidate} from './candidate.model';
import {CandidateService} from './candidate.service';

import {Observable} from 'rxjs/Observable';
import {Subject} from 'rxjs/Subject';

// Observable class extensions
import 'rxjs/add/observable/of';
// Observable operators
import 'rxjs/add/operator/catch';
import 'rxjs/add/operator/debounceTime';
import 'rxjs/add/operator/distinctUntilChanged';
import 'rxjs/add/operator/switchMap';

@Component({
  moduleId: module.id,
  selector: 'app',
  templateUrl: 'app.html'
})
export class AppComponent implements OnInit {
  candidates: Observable<Candidate[]>;
  private queries = new Subject<string>();

  constructor(private candidateService: CandidateService) {
  }

  search(query: string): void {
    this.queries.next(query);
  }

  ngOnInit(): void {
    this.candidates = this.queries
      .debounceTime(300) // wait 300ms after each keystroke before considering the term
      .distinctUntilChanged() // ignore if next search query is the same as previous
      .switchMap(query => // switch to new observable each time the term changes
        // return the http search observable
        query
          ? this.candidateService.search(query)
          // or the observable of empty candidates if there was no search term
          : Observable.of<Candidate[]>([]))
      .catch(error => {
        console.log(error);
        return Observable.of<Candidate[]>([]);
      });
  }
}
