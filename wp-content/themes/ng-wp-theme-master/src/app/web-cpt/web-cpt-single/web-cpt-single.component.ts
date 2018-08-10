import {Component, OnInit} from '@angular/core';
import {WebCptService} from '../web-cpt.service';
import {ActivatedRoute, ParamMap} from '@angular/router';
import {HttpErrorResponse} from '@angular/common/http';
import {WebCpt} from '../web-cpt';
import 'rxjs/add/operator/switchMap';

@Component({
    selector: 'app-web-cpt-single',
    templateUrl: './web-cpt-single.component.html',
    styleUrls: ['./web-cpt-single.component.css'],
    providers: [WebCptService]
})
export class WebCptSingleComponent implements OnInit {

    post: WebCpt;

    constructor(private postsService: WebCptService, private route: ActivatedRoute) { 
        console.log(this);
        console.log("Web CPT Single Comp");
    }

    ngOnInit() {

        this.route.paramMap
            .switchMap((params: ParamMap) =>
                this.postsService.getPost(params.get('slug')))
            .subscribe(
            (post: WebCpt[]) => this.post = post[0],
            (err: HttpErrorResponse) => err.error instanceof Error ? console.log('An error occurred:', err.error.message) : console.log(`Backend returned code ${err.status}, body was: ${err.error}`)
            );

    }

}
