/* tslint:disable:no-unused-variable */

import { TestBed, async, inject } from '@angular/core/testing';
import { AcfoptService } from './acfopt.service';

describe('AcfoptService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [AcfoptService]
    });
  });

  it('should ...', inject([AcfoptService], (service: AcfoptService) => {
    expect(service).toBeTruthy();
  }));
});
