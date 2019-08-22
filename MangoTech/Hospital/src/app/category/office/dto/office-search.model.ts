import { PAGE_CONFIG } from '../../../shared/resources/config.resource';


export class OfficeSearchRequest {
  officeName: string;
  pageIndex: number;
  pageSize: number;

  constructor() {
    this.officeName = '';
    this.pageIndex = PAGE_CONFIG.defaultPageIndex;
    this.pageSize = PAGE_CONFIG.defaultPageSize;
  }
}
