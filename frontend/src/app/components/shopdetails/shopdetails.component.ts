import { Component, OnInit } from '@angular/core';
import { JarwisService } from '../../services/jarwis.service';
import { TokenService } from '../../services/token.service';
import { SharedService } from '../../services/shared.service';
import { Router, ActivatedRoute } from '@angular/router';
// import { setTimeout } from 'timers';
@Component({
  selector: 'app-shopdetails',
  templateUrl: './shopdetails.component.html',
  styleUrls: ['./shopdetails.component.css']
})
export class ShopdetailsComponent implements OnInit {
  cartItemCount: any;
  // closeAlert(arg0: any): any {
  //   throw new Error("Method not implemented.");
  // }
  public form = {
    product_name: null,
    price:null,
     qty: 1,
    pro_id: null,
    productfile:null
  };
   alerts: any;
  constructor(private Token: TokenService, 
    private Jarwis: JarwisService,
    private Shared: SharedService,
    private router: Router,
    public actRoute: ActivatedRoute){ }
  public response:any;
  public responseshop:any;
  public message = null;
  public error = null;
  public sdet;
  public productAddedToCart;
  OnAddCart(product){
 console.log(product)
this.productAddedToCart=this.Jarwis.getproductFromCart();
if(this.productAddedToCart==null)
{
  this.productAddedToCart=[];
  this.productAddedToCart.push(product);
  this.Jarwis.addproductToCart(this.productAddedToCart);
  this.alerts.push({
id:1,
type:'success',
message:'product added to cart.'
  });
  // setTimeout(()=>{
  //   this.closeAlert(this.alerts);
  // },3000);
}
else{
  let tempProduct=this.productAddedToCart.find(p=>p.id==product.id);
  if(tempProduct==null){
    this.productAddedToCart.push(product);
    this.Jarwis.addproductToCart(this.productAddedToCart);
    this.alerts.push({
  id:1,
  type:'success',
  message:'product added to cart.'
    });
    // setTimeout(()=>{
    //   this.closeAlert(this.alerts);
    // },3000);
  }
  else{
    this.alerts.push({
      id:2,
      type:'warming',
      message:'product already exist in cart.'
        });
        // setTimeout(()=>{
        //   this.closeAlert(this.alerts);
        // },3000);
  }
}
this.cartItemCount=this.productAddedToCart.length;
this.Shared.updateCartCount(this.cartItemCount);

}
public closeAlert(alert:any){
  const index:number =this.alerts.indexOf(alert);
  this.alerts.splice(index,1);
}
// onSubmit() {
//   // this.form.cat_id=this.responsecat.id
//   this.form.product_name=this.sdet.product_name
//   this.form.price=this.sdet.price
//   this.form.pro_id=this.sdet.id
//   this.form.productfile=this.sdet.productfile
//   console.log(this.form)
//   this.Jarwis.addtocart(this.form).subscribe(
//      data => this.handleResponse(data),
//      error => this.handleError(error)
//   );
// }
// handleResponse(data) {
//   this.message=data.message;
//   console.log(data);
//  // this.Token.handle(data.access_token);
//   this.router.navigateByUrl('/cart');
// }
// handleError(error) {
//   this.error = error.error.errors.cat_name[0];
// //console.log(error.error.errors.cat_name[0]);

// }
  ngOnInit() {
    // this.displayshopdetails();
    this.actRoute.paramMap.subscribe((params => {
      //console.log(this.shop_id)
      let id = params.get('id');
       console.log(id)
    this.Jarwis.productdetail(id).subscribe(data=>{
    this.response = data;
    this.sdet=this.response.shop[0];
  console.log(this.response);
  })
     // console.log(this.Jarwis.shop(id));
    }));
  }
  navigate(id){
    this.router.navigate(['shopdetails/'+id+''])
  }
}
