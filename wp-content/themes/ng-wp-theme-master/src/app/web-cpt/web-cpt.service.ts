import {Injectable} from '@angular/core';
import {HttpClient} from "@angular/common/http";
import {Observable} from 'rxjs/Observable';
import {WebCpt} from './web-cpt';
import {environment} from '../../environments/environment';


@Injectable()
export class WebCptService {

    private _wpBase = environment.wpBase;

    constructor(private http: HttpClient) {
      // console.log(this);
        
    }

    getPosts(): Observable<WebCpt[]> {
        return this.http.get<WebCpt[]>(this._wpBase + 'web_portfolio');
        //return this.http.get<WebCpt[]>(this._wpBase + 'web_portfolio?filter%5Borderby%5D=&filter%5Border%5D=DESC&_embed=true&per_page=25');

    }

    getPost(slug: string): Observable<WebCpt[]> {

        return this.http.get<WebCpt[]>(this._wpBase + `web_portfolio?slug=${slug}`);

    }

}
