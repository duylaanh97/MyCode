import { Injectable } from '@angular/core';
import { BehaviorSubject, ReplaySubject, Observable, of } from 'rxjs';
import { BaseApiService } from './base-api.service';
import { Router } from '@angular/router';
import { TokenService } from './token.service';
import { AUTH_PATHS } from '../utils/auth-paths';
import { map } from 'rxjs/operators';

@Injectable()
export class AuthService {
  //   private currentUserSubject = new BehaviorSubject<CustomerModel>({} as CustomerModel);
  //   public currentUser = this.currentUserSubject.asObservable().pipe(distinctUntilChanged());

  public isAuthenticatedSubject = new ReplaySubject<boolean>(1);
  public isAuthenticated = this.isAuthenticatedSubject.asObservable();

  constructor(
    private apiService: BaseApiService,
    private tokenService: TokenService,
    public router: Router,
  ) { }

  populate(): Observable<boolean> {
    if (this.tokenService.getToken()) {
      this.saveAuth(this.tokenService.getToken());
      return of(true);
    }
    this.purgeAuth();
    return of(false);
  }

  saveAuth(token: string) {
    this.tokenService.saveToken(token);
    this.isAuthenticatedSubject.next(true);
  }

  purgeAuth() {
    this.tokenService.destroyToken();
    this.isAuthenticatedSubject.next(false);
  }

  login(credentials: any): Observable<any> {
    return this.apiService.post(AUTH_PATHS.LOGIN, credentials).pipe(map(response => {
      console.log(response);
      const token = response.token;
      console.log('response login token ', token);
      this.saveAuth(token);
      return token;
    }));
  }

  register(credentials: any): Observable<any> {
    return this.apiService.post(AUTH_PATHS.REGISTER, credentials)
      .pipe(map(
        response => {
          return response.responseMessage;
        }
      ));
  }

  logout(): Observable<any> {
    return this.apiService.get(AUTH_PATHS.LOGOUT)
      .pipe(map(response => {
        this.purgeAuth();
        return response.message;
      }));
  }

  canActivate(): boolean {
    if (!this.populate()) {
      this.router.navigate(['']);
      return false;
    }
    return true;
  }
}
