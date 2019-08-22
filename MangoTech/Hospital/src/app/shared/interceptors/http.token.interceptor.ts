import { Injectable } from '@angular/core';
import { HttpEvent, HttpInterceptor, HttpHandler, HttpRequest } from '@angular/common/http';
import { Observable } from 'rxjs';
import { TokenService } from '../services/token.service';

@Injectable()
export class HttpTokenInterceptor implements HttpInterceptor {

  constructor(private tokenService: TokenService) {}

  intercept(req: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<any>> {
    let headersConfig = {};

    if (req.headers.keys().length > 0) {
      const headerLength = req.headers.keys().length;
      for (let i = 0; i < headerLength; i++) {
        const name = req.headers.keys()[i];
        headersConfig[name] = req.headers.get(name);
      }
    } else {
      headersConfig = {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
      };
    }

    const token = this.tokenService.getToken();

    if (token) {
      headersConfig['Authorization'] = `${token}`;
      const authReq = req.clone({ setHeaders: headersConfig });
      return next.handle(authReq);
    }
    return next.handle(req);
  }
}
