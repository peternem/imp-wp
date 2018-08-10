/* tslint:disable:no-unused-variable */

import { TestBed, async, inject } from '@angular/core/testing';
import { WebCptService } from './web-cpt.service';

describe('Service: WebCptService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [WebCptService]
    });
  });

  it('should ...', inject([WebCptService], (service: WebCptService) => {
    expect(service).toBeTruthy();
  }));
});
