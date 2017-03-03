import {Injectable} from '@angular/core';
import {Http} from '@angular/http';
import {Observable} from 'rxjs/Observable';
import 'rxjs/add/operator/map';

import {Candidate} from './candidate.model';

@Injectable()
export class CandidateService {
  constructor(private http: Http) {
  }

  search(term: string): Observable<Candidate[]> {
    return this.http
      .get(`api/candidate?q=${term}`)
      .map(response => response.json().data as Candidate[]);
  }
}
