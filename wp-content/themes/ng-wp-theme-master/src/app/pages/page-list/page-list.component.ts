import {Component, OnInit} from '@angular/core';
import {Page} from '../page';
import {PagesService} from '../pages.service';
import {Router} from '@angular/router';
import {HttpErrorResponse} from '@angular/common/http';

@Component({
    selector: 'app-page-list',
    templateUrl: './page-list.component.html',
    styleUrls: ['./page-list.component.css'],
    providers: [PagesService]
})

export class PageListComponent implements OnInit {

    page: Page[];

    constructor(private pagesService: PagesService, private router: Router) {
        //console.log(this);
    }

    ngOnInit() {
        this.pagesService.getPosts().subscribe(
            (page: Page[]) => this.page = page,
            (err: HttpErrorResponse) => err.error instanceof Error ? console.log('An error occurred:', err.error.message) : console.log(`Backend returned code ${err.status}, body was: ${err.error}`));

    }

    selectPost(slug) {
        this.router.navigate([slug]);
    }

}
