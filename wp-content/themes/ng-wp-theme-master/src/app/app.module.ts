import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';

import { AppComponent } from './app.component';
import { PostListComponent } from './posts/post-list/post-list.component';
import { WebCptListComponent } from './web-cpt/web-cpt-list/web-cpt-list.component';
import { Wpng2RoutingModule } from './app-routing.module';
import { PostSingleComponent } from './posts/post-single/post-single.component';
import { WebCptSingleComponent } from './web-cpt/web-cpt-single/web-cpt-single.component';

import { PageListComponent } from './pages/page-list/page-list.component';
import { PageSingleComponent } from './pages/page-single/page-single.component';


@NgModule({
  declarations: [
    AppComponent,
    PostListComponent,
    PostSingleComponent,
    PageListComponent,
    PageSingleComponent,
    WebCptListComponent,
    WebCptSingleComponent,
  ],
  imports: [
    BrowserModule,
    FormsModule,
    HttpClientModule,
    Wpng2RoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule {}
