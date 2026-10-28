import { Routes } from '@angular/router';

import {LoginPage} from './features/login-page/login-page';
import {RegisterPage} from './features/register-page/register-page';
import {DashboardPage} from './features/dashboard-page/dashboard-page';
import { EvaluationStatusModal } from './features/evaluation-status-modal/evaluation-status-modal';
import { FeedbackModal } from './features/feedback-modal/feedback-modal';
import { ActivityModal } from './features/activity-modal/activity-modal';

export const routes: Routes = [

	{path:'', component:LoginPage},
	{path:'login', component:LoginPage},
	{path:'register', component:RegisterPage},
	{path:'dashboard', component:DashboardPage},
	{path: '**', redirectTo: 'login', pathMatch: 'full'},
	{path:'evaluationstatus', component:EvaluationStatusModal},
	{path:'feedback', component:FeedbackModal},
	{path:'activities', component:ActivityModal},

];