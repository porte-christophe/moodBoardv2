import { Routes } from '@angular/router';

import {LoginPage} from './features/login-page/login-page';
import {RegisterPage} from './features/register-page/register-page';
import {DashboardPage} from './features/dashboard-page/dashboard-page';

export const routes: Routes = [

	{path:'', component:LoginPage},
	{path:'login', component:LoginPage},
	{path:'register', component:RegisterPage},
	{path:'dashboard', component:DashboardPage},
];