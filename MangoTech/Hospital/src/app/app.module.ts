import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { HttpClientModule, HTTP_INTERCEPTORS } from '@angular/common/http';
import { BrowserModule } from '@angular/platform-browser';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { LocationStrategy, HashLocationStrategy } from '@angular/common';
import { AppRoutes } from './app.routes';

import { AppComponent } from './app.component';
import { AppMenuComponent, AppSubMenuComponent } from './app.menu.component';
import { AppTopbarComponent } from './app.topbar.component';
import { AppFooterComponent } from './app.footer.component';
import { AppBreadcrumbComponent } from './app.breadcrumb.component';
import { AppRightpanelComponent } from './app.rightpanel.component';
import { AppInlineProfileComponent } from './app.profile.component';
import { BreadcrumbService } from './breadcrumb.service';
import { ScrollPanelModule } from 'primeng/primeng';
import { TreatmentModule } from './treatment/treatment.module';
import { SharedModule } from './shared/shared.module';
import { LoginComponent } from './login/login.component';

import {MessagesModule} from 'primeng/messages';
import {MessageModule} from 'primeng/message';
import { HttpTokenInterceptor } from './shared/interceptors/http.token.interceptor';
import {PhysicianService } from './user/physician/physician.service';
import {InputTextareaModule} from 'primeng/inputtextarea';
import {MultiSelectModule} from 'primeng/multiselect';
import {CheckboxModule} from 'primeng/checkbox';
import {RadioButtonModule} from 'primeng/radiobutton';
import {DropdownModule} from 'primeng/dropdown';

@NgModule({
    imports: [
        BrowserModule,
        FormsModule,
        AppRoutes,
        HttpClientModule,
        BrowserAnimationsModule,
        ScrollPanelModule,
        TreatmentModule,
        MessageModule,
        MessagesModule,
        SharedModule,
        InputTextareaModule,
        MultiSelectModule,
        CheckboxModule,
        RadioButtonModule,
        DropdownModule
    ],
    declarations: [
        AppComponent,
        AppMenuComponent,
        AppSubMenuComponent,
        AppTopbarComponent,
        AppFooterComponent,
        AppBreadcrumbComponent,
        AppRightpanelComponent,
        AppInlineProfileComponent,
        LoginComponent,
    ],
    providers: [
        { provide: LocationStrategy, useClass: HashLocationStrategy },
        { provide: HTTP_INTERCEPTORS, useClass: HttpTokenInterceptor, multi: true },
        BreadcrumbService, PhysicianService
    ],
    bootstrap: [AppComponent]
})
export class AppModule { }
