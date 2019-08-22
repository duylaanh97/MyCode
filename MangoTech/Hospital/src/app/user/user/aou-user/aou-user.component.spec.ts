import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AouUserComponent } from './aou-user.component';

describe('AouUserComponent', () => {
  let component: AouUserComponent;
  let fixture: ComponentFixture<AouUserComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AouUserComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AouUserComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
