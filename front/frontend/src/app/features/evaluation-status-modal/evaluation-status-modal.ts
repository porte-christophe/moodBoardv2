import { Component, OnInit, inject } from '@angular/core';
import { EvaluationStatusService } from '../../services/evaluation-status';

@Component({
  imports: [],
  selector: 'app-evaluation-status-modal',
  styleUrl: './evaluation-status-modal.css',
  templateUrl: './evaluation-status-modal.html',
})

export class EvaluationStatusModal implements OnInit {
	moods: any[] = [];
	bodyStatuses: any[] = [];


	private readonly evaluationStatusService = inject(EvaluationStatusService);

	ngOnInit(): void {
		this.evaluationStatusService.getMoods().subscribe({
			next: (data) => {
				this.moods = data;
				console.log('Moods récupérés :', data);
			},
			error: (error) => {
				console.error('Erreur lors de la récupération des moods :', error);
			}
		});

		this.evaluationStatusService.getBodyStatuses().subscribe({
			next: (data) => {
				this.bodyStatuses = data;
				console.log('Body statuses récupérés :', data);
			},
			error: (error) => {
				console.error('Erreur lors de la récupération des body statuses :', error);
			}
		});
	}
}