import { Component, OnInit } from '@angular/core';
import { JarwisService } from '../../services/jarwis.service';
import { Router } from '@angular/router';
@Component({
  selector: 'app-addproduct',
  templateUrl: './addproduct.component.html',
  styleUrls: ['./addproduct.component.css']
})
export class AddproductComponent implements OnInit {
  public det : any;
  public response:any;

  public form = {
    name: null,
    price: null,
    quantity:null,
    file:null,
    shortd:null
  };
  public error = null;
  constructor( 
    private Jarwis: JarwisService,
    private router: Router
    
  ) { }
  onSubmit() {
    // alert("...");
    // var myform=new FormData();
    // console.log(this.form);
    // myform.append('image',this.file);
    this.Jarwis.product(this.form).subscribe(
      data=>{
        console.log(data);
        //this.Jarwis.productdetail(data);
      //data => this.handleResponse(data),
      //error => this.handleError(error)
      });
  }
  
  
displayproduct(){
  // this.response = this.Jarwis.det;
  // console.log(this.response);
  this.Jarwis.productdetails().subscribe(data=>{
    //console.log(data);
    this.response = data;
    //console.log(this.response);
  })
  
}
// shop(){
//   // this.response = this.Jarwis.det;
//   // console.log(this.response);
//   this.Jarwis.shop().subscribe(data=>{
//     //console.log(data);
//     this.response = data;
//     console.log(this.response);
//   })
  
// }
ngOnInit() {
  this.displayproduct();
  //this.shop()
}

}
