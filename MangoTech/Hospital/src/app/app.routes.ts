import {Routes, RouterModule} from '@angular/router';
import {ModuleWithProviders} from '@angular/core';

export const routes: Routes = [
    {
        path: '', redirectTo: 'dashboard', pathMatch: 'full'
    },
    {
        path: 'dashboard', loadChildren: './dashboard/dashboard.module#DashboardModule'
    },
    {
        path: 'user', loadChildren: './user/user.module#UserModule'
    },
    {
        path: 'category', loadChildren: './category/category.module#CategoryModule'
    },
    {
        path: 'treatment', loadChildren: './treatment/treatment.module#TreatmentModule'
    },
    {
        path: 'payment', loadChildren: './payment/payment.module#PaymentModule'
    }
];

export const AppRoutes: ModuleWithProviders = RouterModule.forRoot(routes, {scrollPositionRestoration: 'enabled'});
