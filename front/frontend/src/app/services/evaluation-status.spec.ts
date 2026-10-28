import { TestBed } from '@angular/core/testing';
import { EvaluationStatus } from './evaluation-status';

describe('EvaluationStatus', () => {
  let service: EvaluationStatus;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(EvaluationStatus);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
