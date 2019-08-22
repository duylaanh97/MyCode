import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AouPaymentComponent } from './aou-payment.component';

describe('AouPaymentComponent', () => {
  let component: AouPaymentComponent;
  let fixture: ComponentFixture<AouPaymentComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AouPaymentComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AouPaymentComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
