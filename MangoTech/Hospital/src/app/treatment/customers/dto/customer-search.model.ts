import { PAGE_CONFIG } from 'src/app/shared/resources/config.resource';

export class CustomerSearchRequest {
  phone: string;
  customerName: string;
  pageIndex: number;
  pageSize: number;

  // constructor() {
  //   this.phone = '';
  //   this.customerName = '';
  //   this.pageIndex = 0;
  //   this.pageSize = 10;
  // }

  constructor() {
    this.phone = '';
    this.customerName = '';
    this.pageIndex = PAGE_CONFIG.defaultPageIndex;
    this.pageSize = PAGE_CONFIG.defaultPageSize;
  }
}
