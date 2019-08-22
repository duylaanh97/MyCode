import { Injectable } from '@angular/core';
import { BaseApiService } from '../../shared/services/base-api.service';
import { Observable } from 'rxjs';
import { PERMISSION_API_PATH } from './resources/permission.resource';
import { map } from 'rxjs/operators';
import { PermissionRequest } from './dto/permission-request.model';
import { HttpParams } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class PermissionService {

  constructor(
    private apiService: BaseApiService
  ) { }

  listRoles(): Observable<any> {
    return this.apiService.get(PERMISSION_API_PATH.listRoles).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }

  listRolesByGroup(groupId: string): Observable<any> {
    const params = new HttpParams().append('groupId', groupId);
    return this.apiService.get(PERMISSION_API_PATH.listRolesByGroup, params).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }

  doPermission(permissionRequest: PermissionRequest): Observable<any> {
    return this.apiService.post(PERMISSION_API_PATH.configPermission, permissionRequest).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }
}
