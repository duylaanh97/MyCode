import { Injectable } from '@angular/core';
import { environment } from '../../../environments/environment';
import { HttpClient, HttpParams, HttpHeaders } from '@angular/common/http';
import { Observable, throwError } from 'rxjs';
import { catchError } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class BaseApiService {

  private defaultHeaders = new HttpHeaders({
    'Content-Type': 'application/json',
    'Accept': 'application/json'
  });

  constructor(
    private http: HttpClient,
  ) {}

  private formatErrors(error: any) {
    return throwError(error);
  }

  get(path: string, params: HttpParams = new HttpParams()): Observable<any> {
    return this.http.get(
      `${environment.apiUrl}${path}`,
      { params }
    ).pipe(catchError(this.formatErrors));
  }

  post(path: string, body: Object = {}, login: boolean = false): Observable<any> {
    if (login) {
      return this.http.post(
        `${environment.apiUrl}${path}`,
        body,
        {
          observe: 'response',
        }
      ).pipe(catchError(this.formatErrors));
    }

    return this.http.post(
      `${environment.apiUrl}${path}`,
      JSON.stringify(body),
      { headers: this.defaultHeaders }
    ).pipe(catchError(this.formatErrors));
  }

  put(path: string, body: Object = {}): Observable<any> {
    return this.http.put(
      `${environment.apiUrl}${path}`,
      JSON.stringify(body),
      { headers: this.defaultHeaders }
    ).pipe(catchError(this.formatErrors));
  }

  patch(path: string, body: Object = {}): Observable<any> {
    return this.http.patch(
      `${environment.apiUrl}${path}`,
      JSON.stringify(body),
      { headers: this.defaultHeaders }
    ).pipe(catchError(this.formatErrors));
  }

  delete(path: string): Observable<any> {
    return this.http.delete(
      `${environment.apiUrl}${path}`,
    ).pipe(catchError(this.formatErrors));
  }

  postUploadFile(path: string, body: FormData): Observable<any> {
    return this.http.post(
      `${environment.apiUrl}${path}`,
      body,
      {
        headers: {
          'Accept': 'application/json',
          'enctype': 'multipart/form-data'
        }
      }
    ).pipe(catchError(this.formatErrors));
  }

  getJSON(path: string): Observable<any> {
    return this.http.get(path);
  }
}
