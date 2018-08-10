import {NgModule} from '@angular/core';
import {Routes, RouterModule} from '@angular/router';
import {PostListComponent} from './posts/post-list/post-list.component';
import {PostSingleComponent} from './posts/post-single/post-single.component';

import {PageListComponent} from './pages/page-list/page-list.component';
import {PageSingleComponent} from './pages/page-single/page-single.component';

import {WebCptListComponent} from './web-cpt/web-cpt-list/web-cpt-list.component';
import {WebCptSingleComponent} from './web-cpt/web-cpt-single/web-cpt-single.component';


const routes: Routes = [
    {
        path: '',
        component: PostListComponent,
        pathMatch: 'full'
    },
    {
        path: '',
        component: PageListComponent,
        pathMatch: 'full',
        outlet: 'page-list',
    },
    {
        path: '',
        component: WebCptListComponent,
        pathMatch: 'full',
        outlet: 'web-cpt-list',
    },
    {
        path: 'posts/:slug',
        component: PostSingleComponent,
    },

    {
        path: 'web-portfolio/:slug',
        component: WebCptSingleComponent,
    },
    {
        path: '',
        component: WebCptListComponent, children: [
            {
                path: 'web-portfolio',
                component: WebCptListComponent,
            },
            {
                path: 'web-portfolio/:slug',
                component: WebCptSingleComponent,
            },
        ]
    },
    {
        path: '',
        component: PostListComponent, children: [
            {
                path: 'posts',
                component: WebCptListComponent,
            },
            {
                path: 'posts/:slug',
                component: WebCptSingleComponent,
            },
        ]
    },
        {
        path: '',
        component: PageListComponent, children: [
            {
                path: 'pages',
                component: PageListComponent,
            },
            {
                path: 'pages/:slug',
                component: PageSingleComponent,
            },
        ]
    },

];

var myRoute_wp = RouterModule.forRoot(routes);

@NgModule({
    imports: [myRoute_wp],
    exports: [RouterModule],
    providers: []
})
export class Wpng2RoutingModule {}
