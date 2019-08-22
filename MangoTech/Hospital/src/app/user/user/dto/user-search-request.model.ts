import { PAGE_CONFIG } from '../../../shared/resources/config.resource';

export class UserSearchRequest {
  username: string;
  fullName: string;
  phone: string;
  pageIndex: number;
  pageSize: number;

  constructor() {
    this.username = '';
    this.fullName = '';
    this.phone = '';
    this.pageIndex = PAGE_CONFIG.defaultPageIndex;
    this.pageSize = PAGE_CONFIG.defaultPageSize;
  }
}
