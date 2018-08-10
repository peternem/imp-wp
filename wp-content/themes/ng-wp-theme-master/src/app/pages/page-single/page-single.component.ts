import {Component, OnInit} from '@angular/core';
import {PagesService} from '../pages.service';
import {ActivatedRoute, ParamMap} from '@angular/router';
import {HttpErrorResponse} from '@angular/common/http';
import {Page} from '../page';
import 'rxjs/add/operator/switchMap';

@Component({
    selector: 'app-post-single',
    templateUrl: './page-single.component.html',
    styleUrls: ['./page-single.component.css'],
    providers: [PagesService]
})
export class PageSingleComponent implements OnInit {

    post: Page;

    constructor(private pageService: PagesService, private route: ActivatedRoute) {
        console.log(this);
    }

    ngOnInit() {

        this.route.paramMap
            .switchMap((params: ParamMap) =>
                this.pageService.getPost(params.get('slug')))
            .subscribe(
            (post: Page[]) => this.post = post[0],
            (err: HttpErrorResponse) => err.error instanceof Error ? console.log('An error occurred:', err.error.message) : console.log(`Backend returned code ${err.status}, body was: ${err.error}`)
            );

    }

}
