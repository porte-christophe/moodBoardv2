
import { Injectable, signal, inject } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Mood } from '../types/mood-type';
import { BodyStatus } from '../types/body-status';

@Injectable({
  providedIn: 'root'
})
export class EvaluationStatusService {
    private readonly http = inject(HttpClient)
    private apiUrl = 'http://localhost:3333';
    private moods = signal<Mood[]>([] as Mood[]);
    private bodyStatuses = signal<BodyStatus[]>([] as BodyStatus[]);
    // Signal en lecture seule pour les composants
    readonly moodsSignal = this.moods.asReadonly()
    readonly bodyStatusesSignal = this.bodyStatuses.asReadonly()

    // Mettre à jour les moods
    updateMoods(moods: Mood[]): void {
        this.moods.set(moods);
    }

    // Mettre à jour les body statuses
    updateBodyStatuses(bodyStatuses: BodyStatus[]): void {
        this.bodyStatuses.set(bodyStatuses);
    }

    // Récupérer tous les moods depuis Symfony
    getMoods(): Observable<any[]> {
        return this.http.get<any[]>(`${this.apiUrl}/moods`);
    }

    // Récupérer tous les body status depuis Symfony
    getBodyStatuses(): Observable<any[]> {
        return this.http.get<any[]>(`${this.apiUrl}/body-statuses`);
    }
}