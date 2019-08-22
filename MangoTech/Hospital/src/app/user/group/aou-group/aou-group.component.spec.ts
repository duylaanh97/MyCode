import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AouGroupComponent } from './aou-group.component';

describe('AouGroupComponent', () => {
  let component: AouGroupComponent;
  let fixture: ComponentFixture<AouGroupComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AouGroupComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AouGroupComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
