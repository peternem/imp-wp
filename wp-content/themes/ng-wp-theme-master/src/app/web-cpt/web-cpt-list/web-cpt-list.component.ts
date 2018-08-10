import {Component, OnInit} from '@angular/core';
import {WebCpt} from '../web-cpt';
import {WebCptService} from '../web-cpt.service';
import {Router} from '@angular/router';
import {HttpErrorResponse} from '@angular/common/http';

@Component({
    selector: 'app-web-cpt-list',
    templateUrl: './web-cpt-list.component.html',
    styleUrls: ['./web-cpt-list.component.css'],
    providers: [WebCptService]

})
export class WebCptListComponent implements OnInit {

    wpposts: WebCpt[];

    constructor(private postsService: WebCptService, private router: Router) {}

    ngOnInit() {

        this.postsService.getPosts().subscribe(
            (wpposts: WebCpt[]) => this.wpposts = wpposts,
            (err: HttpErrorResponse) => err.error instanceof Error ? console.log('An error occurred:', err.error.message) : console.log(`Backend returned code ${err.status}, body was: ${err.error}`));

    }

    selectPost(slug) {
        this.router.navigate([slug]);
    }
}
