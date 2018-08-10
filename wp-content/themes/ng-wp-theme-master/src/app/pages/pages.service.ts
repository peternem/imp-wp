import {Injectable} from '@angular/core';
import {HttpClient} from "@angular/common/http";
import {Observable} from 'rxjs/Observable';
import {Page} from './page';
import {environment} from '../../environments/environment';


@Injectable()
export class PagesService {

    private _wpBase = environment.wpBase;

    constructor(private http: HttpClient) {
        //console.log(this);
    }

    getPosts(): Observable<Page[]> {

        return this.http.get<Page[]>(this._wpBase + 'pages');

    }

    getPost(slug: string): Observable<Page[]> {

        return this.http.get<Page[]>(this._wpBase + 'pages?slug=${slug}');

    }

}
