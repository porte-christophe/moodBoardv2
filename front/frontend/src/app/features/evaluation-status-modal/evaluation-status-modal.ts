import { Component, OnInit, inject } from '@angular/core';
import { EvaluationStatusService } from '../../services/evaluation-status';
import { Mood } from '../../types/mood-type';

@Component({
  imports: [],
  selector: 'app-evaluation-status-modal',
  styleUrl: './evaluation-status-modal.css',
  templateUrl: './evaluation-status-modal.html',
})

export class EvaluationStatusModal implements OnInit {
	
	private readonly evaluationStatusService = inject(EvaluationStatusService);
	moods = this.evaluationStatusService.moodsSignal;
	bodyStatuses = this.evaluationStatusService.bodyStatusesSignal;
	
	ngOnInit(): void {
		this.evaluationStatusService.getMoods().subscribe({
			next: (data) => {
				this.evaluationStatusService.updateMoods(data);
				console.log('Moods récupérés :', data);
			},
			error: (error) => {
				console.error('Erreur lors de la récupération des moods :', error);
			}
		});

		this.evaluationStatusService.getBodyStatuses().subscribe({
			next: (data) => {
				this.evaluationStatusService.updateBodyStatuses(data);
				console.log('Body statuses récupérés :', data);
			},
			error: (error) => {
				console.error('Erreur lors de la récupération des body statuses :', error);
			}
		});
	}
}