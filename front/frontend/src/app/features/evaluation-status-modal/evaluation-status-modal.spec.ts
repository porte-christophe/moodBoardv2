import { ComponentFixture, TestBed } from '@angular/core/testing';
import { EvaluationStatusModal } from './evaluation-status-modal';

describe('EvaluationStatusModal', () => {
  let component: EvaluationStatusModal;
  let fixture: ComponentFixture<EvaluationStatusModal>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [EvaluationStatusModal],
    }).compileComponents();

    fixture = TestBed.createComponent(EvaluationStatusModal);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
