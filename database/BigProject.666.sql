set time_zone = "+00:07";

create table tb_admin
(
	Admin_ID				int				not null,
	Admim_FirstName			varchar(66)		not null,
	Admim_LastName			varchar(66)		not null,
	Admin_UserName			varchar(66)		not null unique,
	Admin_Email				varchar(66)		not null unique,
	Admin_Password			varchar(66)		not null,
	Admin_DateCreated		timestamp		not null default current_timestamp,
	Admin_DateUpdated		timestamp		not null default current_timestamp on update current_timestamp
);

create table tb_user
(
	User_ID					int				not null,
	User_FirstName			varchar(66)		not null,
	User_LastName			varchar(66)		not null,
	User_UserName			varchar(66)		not null unique,
	User_Email				varchar(66)		not null unique,
	User_Password			varchar(66)		not null,
	User_Phone				varchar(66)		not null,
	User_Nation				varchar(66)		not null,
	User_Address			varchar(200)	not null,
	User_DateOfBirth		date			not null,
	User_DateCreated		timestamp		not null default current_timestamp,
	User_DateUpdated		timestamp		not null default current_timestamp on update current_timestamp
);

create table tb_logs
(
  Logs_ID 					int 			not null,
  User_ID 					int 			not null,
  Logs_IP 					varchar(66)  	not null,
  Logs_LoginTime 			timestamp 		not null default current_timestamp,
  Logs_LogoutTime			timestamp  		default 0 on update current_timestamp,
  Logs_Status 				bit 			not null
);

create table tb_category
(
	Cate_ID					int				not null,
	Cate_Name				varchar(66)		not null,
	Cate_Detail				varchar(200)	not null,
	Cate_DateCreated		timestamp		not null default current_timestamp,
	Cate_DateUpdated		timestamp		not null default current_timestamp on update current_timestamp
);

create table tb_subcategory
(
	SubCate_ID				int				not null,
	SubCate_Name			varchar(66)		not null,
	SubCate_Detail			varchar(200)	not null,
	Cate_ID 				int				not null,
	SubCate_DateCreated		timestamp		not null default current_timestamp,
	SubCate_DateUpdated		timestamp		not null default current_timestamp on update current_timestamp
);

create table tb_trademark
(
	Trad_ID					int				not null,
	Trad_Name				varchar(66)		not null,
	Trad_Detail				varchar(200)	not null,
	Trad_DateCreated		timestamp		not null default current_timestamp,
	Trad_DateUpdated		timestamp		not null default current_timestamp on update current_timestamp
);

create table tb_product
(
	Prod_ID					int				not null,
	Prod_Name				varchar(200)	not null,
	Prod_Detail				text			not null,
	SubCate_ID				int				not null,
	Trad_ID					int				not null,
	Prod_Price				decimal(18,0)	not null check(Prod_Price >= 0),
	Prod_PercentDown		int				not null,
	Prod_Image1				varchar(66)		default null,
	Prod_Image2				varchar(66)		default null,
	Prod_Image3				varchar(66)		default null,
	Prod_Image4				varchar(66)		default null,
	Prod_Image5				varchar(66)		default null,
	Prod_Availability		bit				not null,
	Prod_InventoryNumber	int				not null,
	Prod_DateOfManufacture	date			default null,
	Prod_DateCreation		timestamp		not null default current_timestamp,
	Prod_DateUpdation		timestamp		not null default current_timestamp on update current_timestamp
);

create table tb_cart
(
	Cart_ID					int				not null,
	User_ID					int				not null,
	Cart_DateCreation		timestamp		not null default current_timestamp,
	Cart_DateUpdation 		timestamp		not null default current_timestamp on update current_timestamp
);

create table tb_cartdetail
(
	CD_ID 					int				not null,
	Cart_ID					int				not null,
	Prod_ID					int				not null,
	Cart_Quantity			int				not null,
	Cart_Price				decimal(18,0)	not null check(Cart_Price >= 0),
	CD_DateCreation			timestamp		not null default current_timestamp,
	CD_DateUpdation 		timestamp		not null default current_timestamp on update current_timestamp
);

CREATE TABLE tb_favorite
(
	Favo_ID					int 			not null,
	User_ID 				int 			not null,
	Favo_DateCreation		timestamp		not null default current_timestamp,
	Favo_DateUpdation 		timestamp		not null default current_timestamp on update current_timestamp
);

CREATE TABLE tb_favoritedetail
(
	FD_ID 					int				not null,
	Favo_ID					int 			not null,
	Prod_ID 				int 			not null,
	FD_DateCreation			timestamp		not null default current_timestamp,
	FD_DateUpdation 		timestamp		not null default current_timestamp on update current_timestamp
);

create table tb_bill
(
	Bill_ID					int				not null,
	User_ID					int				not null,
	Bill_FirstName			varchar(66)		not null,
	Bill_LastName			varchar(66)		not null,
	Bill_Email				varchar(66)		not null,
	Bill_Phone				varchar(66)		not null,
	Bill_Nation				varchar(66)		not null,
	Bill_Address			varchar(200)	not null,
	Bill_DateOrder			date			not null,
	Bill_DateDelivery		date			not null,
	Bill_Approved			bit				not null,
	Bill_Status				varchar(66)		not null,
	Bill_Note 				text			not null,
	Bill_Paid				bit				not null,
	Bill_Delivered			bit				not null,
	Bill_TransportationFee	decimal(18,0)	not null check(Bill_TransportationFee >= 0),
	Bill_PaymentMethods		varchar(66)		not null,
	Bill_DateCreation		timestamp		not null default current_timestamp,
	Bill_DateUpdation 		timestamp		not null default current_timestamp on update current_timestamp
);

create table tb_billdetail
(
	BD_ID 					int				not null,
	Bill_ID					int				not null,
	Prod_ID					int				not null,
	BD_Quantity				int				not null,
	BD_Price				decimal(18,0)	not null check (BD_Price >= 0),
	BD_DateCreation			timestamp		not null default current_timestamp,
	BD_DateUpdation 		timestamp		not null default current_timestamp on update current_timestamp
);


alter table TB_Admin
	add constraint PK_Admin primary key (Admin_ID);

alter table TB_User
	add constraint PK_User primary key (User_ID);

alter table TB_Logs
	add constraint PK_Logs primary key (Logs_ID);

alter table TB_Category
	add constraint PK_Category primary key (Cate_ID);

alter table TB_SubCategory
	add constraint PK_SubCategory primary key (SubCate_ID);

alter table TB_Trademark
	add constraint PK_Trademark primary key (Trad_ID);

alter table TB_Product
	add constraint PK_Product primary key (Prod_ID);

alter table TB_Cart
	add constraint PK_Cart primary key (Cart_ID);

alter table TB_CartDetail
	add constraint PK_CartDetail primary key (CD_ID, Cart_ID, Prod_ID);

alter table TB_Favorite
	add constraint PK_Favorite primary key (Favo_ID);

alter table TB_FavoriteDetail
	add constraint PK_FavoriteDetail primary key (FD_ID, Favo_ID, Prod_ID);

alter table TB_Bill
	add constraint PK_Bill primary key (Bill_ID);

alter table TB_BillDetail
	add constraint PK_BillDetail primary key (BD_ID, Bill_ID, Prod_ID);


alter table TB_Admin
	modify column Admin_ID int auto_increment;

alter table TB_User
	modify column User_ID int auto_increment;

alter table TB_Logs
	modify column Logs_ID int auto_increment;

alter table TB_Category
	modify column Cate_ID int auto_increment;

alter table TB_SubCategory
	modify column SubCate_ID int auto_increment;

alter table TB_Trademark
	modify column Trad_ID int auto_increment;

alter table TB_Product
	modify column Prod_ID int auto_increment;

alter table TB_Cart
	modify column Cart_ID int auto_increment;

alter table TB_CartDetail
	modify column CD_ID int auto_increment;

alter table TB_Favorite
	modify column Favo_ID int auto_increment;

alter table TB_FavoriteDetail
	modify column FD_ID int auto_increment;

alter table TB_Bill
	modify column Bill_ID int auto_increment;

alter table TB_BillDetail
	modify column BD_ID int auto_increment;


alter table TB_Logs
	add constraint FK_User_Logs foreign key (User_ID) references TB_User (User_ID);

alter table TB_SubCategory
	add constraint FK_Category_SubCategory foreign key (Cate_ID) references TB_Category (Cate_ID);

alter table TB_Product
	add constraint FK_SubCategory_Product foreign key (SubCate_ID) references TB_SubCategory (SubCate_ID),
	add constraint FK_Trademark_Product foreign key (Trad_ID) references TB_Trademark (Trad_ID);

alter table TB_Cart
	add constraint FK_User_Cart foreign key (User_ID) references TB_User (User_ID);

alter table TB_CartDetail
	add constraint FK_Cart_CartDetail foreign key (Cart_ID) references TB_Cart (Cart_ID),
	add constraint FK_Product_CartDetail foreign key (Prod_ID) references TB_Product (Prod_ID);

alter table TB_Favorite
	add constraint FK_User_Favorite foreign key (User_ID) references TB_User (User_ID);

alter table TB_FavoriteDetail
	add constraint FK_Favorite_FavoriteDetail foreign key (Favo_ID) references TB_Favorite (Favo_ID),
	add constraint FK_Product_FavoriteDetail foreign key (Prod_ID) references TB_Product (Prod_ID);

alter table TB_Bill
	add constraint FK_User_Bill foreign key (User_ID) references TB_User (User_ID);

alter table TB_BillDetail
	add constraint FK_Bill_BillDetail foreign key (Bill_ID) references TB_Bill (Bill_ID),
	add constraint FK_Product_BillDetail foreign key (Prod_ID) references TB_Product (Prod_ID);