import { PAGE_CONFIG } from '../../../shared/resources/config.resource';

export class GroupSearchRequest {
  groupName: string;
  pageIndex: number;
  pageSize: number;

  constructor() {
    this.groupName = '';
    this.pageIndex = PAGE_CONFIG.defaultPageIndex;
    this.pageSize = PAGE_CONFIG.defaultPageSize;
  }
}
