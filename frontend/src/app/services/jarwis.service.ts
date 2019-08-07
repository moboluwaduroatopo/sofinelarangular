import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable()
export class JarwisService {
  // public productdetail:any;
  private baseUrll = 'http://localhost/angularwork/sofine/backend/public';
  private baseUrl = 'http://localhost/angularwork/sofine/backend/public/api';
  public det: any;
  constructor(private http: HttpClient) { }
 
  signup(data) {
    return this.http.post(`${this.baseUrl}/signup`, data)
  }

  login(data) {
    return this.http.post(`${this.baseUrl}/login`, data)
  }
  product(data) {
    return this.http.post(`${this.baseUrl}/product`, data)
  }
 addshop(data) {
    return this.http.post(`${this.baseUrl}/addshop`, data)
  }
  addtocart(data) {
    return this.http.post(`${this.baseUrl}/cart_add`, data)
  }
  addshopdetails(data) {
    return this.http.post(`${this.baseUrl}/addshopdetails`, data)
  }
  profile() {
    return this.http.get(`${this.baseUrl}/me`,{headers:{
      Authorization:`Bearer ${localStorage.token}`
    }})
  }
  addcat(data) {
    return this.http.post(`${this.baseUrl}/addcat`,data,{headers:{
      Authorization:`Bearer ${localStorage.token}`
    }})
  }
  checkout(data) {
    return this.http.post(`${this.baseUrl}/checkout`,data,{headers:{
      Authorization:`Bearer ${localStorage.token}`
    }})
  }
  shop(id:string) {
    return this.http.get(`${this.baseUrl}/shop/${id}`)
  }
  cart() {
    return this.http.get(`${this.baseUrl}/cart-show`)
  }
  cat() {
    return this.http.get(`${this.baseUrl}/cat`)
  }
  shopdetails(id:string) {
    return this.http.get(`${this.baseUrl}/shopdetails/${id}`)
  }
  catid() {
    return this.http.get(`${this.baseUrl}/catid`)
  }
  shopid() {
    return this.http.get(`${this.baseUrl}/shopid`)
  }
  tailor() {
    return this.http.get(`${this.baseUrl}/tailor`)
  }
   productdetails() {
    return this.http.get(`${this.baseUrl}/productdetail`)
  }
  productdetail(id:string) {
    return this.http.get(`${this.baseUrl}/productdetails/${id}`)
  }
  // productdetail(data):Observable<MyNewInterface[]> {
  //   return this.http.get(`${this.baseUrl}/productdetail`, data)
  // }
  getid(data) {
     //console.log(data.user);
    this.det = data;
  }
//   productdetail(data) {
//     //console.log(data.user);
//    this.det = data;
//  }
  sendPasswordResetLink(data) {
    return this.http.post(`${this.baseUrl}/sendPasswordResetLink`, data)
  }
  
  changePassword(data) {
    return this.http.post(`${this.baseUrl}/resetPassword`, data)
  }
  addproductToCart(products:any){
// this.productdetail= u;
localStorage.setItem("product",JSON.stringify(products));
}
getproductFromCart(){
  // this.productdetail= u;
  return JSON.parse(localStorage.getItem("product"));
  }
  removeAllProductFromCart(){
    return localStorage.removeItem('product');
  }
  
updateprofile(data) {
  return this.http.post(`${this.baseUrl}/me`,data,{headers:{
    Authorization:`Bearer ${localStorage.token}`
  }})
}
//
}
