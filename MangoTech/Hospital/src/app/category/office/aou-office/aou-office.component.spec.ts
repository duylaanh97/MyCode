import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AouOfficeComponent } from './aou-office.component';

describe('AouOfficeComponent', () => {
  let component: AouOfficeComponent;
  let fixture: ComponentFixture<AouOfficeComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AouOfficeComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AouOfficeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
