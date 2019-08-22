import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { AuthService } from './services/auth.service';
import { BaseApiService } from './services/base-api.service';
import { TokenService } from './services/token.service';

@NgModule({
  declarations: [],
  imports: [
    CommonModule
  ],
  providers: [
    AuthService,
    BaseApiService,
    TokenService
  ]
})
export class SharedModule { }
