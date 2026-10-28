
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class EvaluationStatusService {

    private apiUrl = 'http://localhost:3333';

    constructor(private http: HttpClient) {}

    // Récupérer tous les moods depuis Symfony
    getMoods(): Observable<any[]> {
        return this.http.get<any[]>(`${this.apiUrl}/moods`);
    }

    // Récupérer tous les body status depuis Symfony
    getBodyStatuses(): Observable<any[]> {
        return this.http.get<any[]>(`${this.apiUrl}/body-statuses`);
    }
}
