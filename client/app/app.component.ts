import {Component} from '@angular/core';
import {Candidate} from './candidate.model';
@Component({
  moduleId: module.id,
  selector: 'app',
  templateUrl: 'app.html',
})
export class AppComponent {
  candidates: Candidate[] = [];
  query: string;
  sayHello(){
    alert(this.query);
  }
}
