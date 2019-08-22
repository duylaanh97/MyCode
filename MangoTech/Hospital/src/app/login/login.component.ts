import { Component, OnInit } from '@angular/core';
import { AuthService } from '../shared/services/auth.service';
import { Router } from '@angular/router';
import { AppComponent } from '../app.component';

interface LoginObject {
  username: string;
  password: string;
}

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
})
export class LoginComponent implements OnInit {

  loginObject: LoginObject;

  constructor(
    private authService: AuthService,
    private router: Router,
    public app: AppComponent
  ) { }

  ngOnInit(): void {

    this.authService.isAuthenticated
      .subscribe(hasAuth => {
        if (hasAuth) {
          this.app.authed = hasAuth;
          this.router.navigateByUrl('/');
        }
      });

    this.loginObject = {
      username: '',
      password: ''
    };
  }

  onSubmitLogin(): void {
    console.log(this.loginObject);
    this.authService.login(this.loginObject).subscribe(token => {
      console.log(token);
      this.router.navigate(['/dashboard']);
    });
  }
}
