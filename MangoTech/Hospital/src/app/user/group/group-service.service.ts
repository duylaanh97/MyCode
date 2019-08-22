import { Injectable } from '@angular/core';
import { BaseApiService } from 'src/app/shared/services/base-api.service';
import { Observable } from 'rxjs';
import { GroupModel } from './model/group.model';
import { GroupSearchRequest } from './dto/group-search.model';
import { GROUP_API_PATH } from './resources/group.resource';
import { map } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class GroupServiceService {

  constructor(
    private apiService: BaseApiService
  ) { }

  listGroup(groupSearchRequest: GroupSearchRequest): Observable<any> {
    return this.apiService.post(GROUP_API_PATH.listGroups, groupSearchRequest).pipe(map(response => {
      console.log(response);
      return response;
    }));
  }
}
