import {Injectable} from '@angular/core';
import {HttpClient} from "@angular/common/http";
import {Observable} from 'rxjs/Observable';
import {Acfopt} from './acfopt';
import {environment} from '../../environments/environment';


@Injectable()
export class AcfoptService {

    private _wpAcf = environment.wpAcf;

    constructor(private http: HttpClient) {
        console.log(this);
    }

    getPosts(): Observable<Acfopt[]> {

        return this.http.get<Acfopt[]>(this._wpAcf + 'options');

    }

    getPost(slug: string): Observable<Acfopt[]> {

        return this.http.get<Acfopt[]>(this._wpAcf + `options?slug=${slug}`);

    }
    

}