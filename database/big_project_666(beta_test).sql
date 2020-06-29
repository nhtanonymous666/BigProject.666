set time_zone = "+00:07";

create table tb_slide
(
	slide_id					bigint				unsigned not null,
	slide_name					varchar(66)			not null,
	slide_detail				varchar(666)		not null,
	slide_date_created			timestamp			not null default current_timestamp,
	slide_date_updated			timestamp			not null default current_timestamp on update current_timestamp
);

create table tb_news
(
	news_id						bigint				unsigned not null,
	admin_id					bigint				unsigned not null,
	news_title					varchar(666)		not null,
	news_content				text				not null,
	news_image					varchar(66)			not null,
	news_date_created			timestamp			not null default current_timestamp,
	news_date_updated			timestamp			not null default current_timestamp on update current_timestamp
);

create table tb_role_user
(
	ru_id						bigint				unsigned not null,
	ru_name						varchar(66)			not null,
	ru_detail					varchar(666)		not null,
	ru_date_created				timestamp			not null default current_timestamp,
	ru_date_updated				timestamp			not null default current_timestamp on update current_timestamp
);

create table tb_role_admin
(
	ra_id						bigint				unsigned not null,
	ra_name						varchar(66)			not null,
	ra_detail					varchar(666)		not null,
	ra_date_created				timestamp			not null default current_timestamp,
	ra_date_updated				timestamp			not null default current_timestamp on update current_timestamp
);

create table tb_administrators
(
	admin_id					bigint				unsigned not null,
	ra_id						bigint				unsigned not null,
	admim_first_name			varchar(66)			not null,
	admim_last_name				varchar(66)			not null,
	admin_user_name				varchar(66)			not null unique,
	admin_email					varchar(66)			not null unique,
	admin_password				varchar(66)			not null,
	admin_remember_token		varchar(666)		default null,
	admin_date_created			timestamp			not null default current_timestamp,
	admin_date_updated			timestamp			not null default current_timestamp on update current_timestamp
);

create table tb_admin_login_history
(
	alh_id 						bigint 				unsigned not null,
	admin_id 					bigint 				unsigned not null,
	alh_ip 						varchar(66)  		not null,
	alh_login_time 				timestamp 			not null default current_timestamp,
	alh_logout_time				timestamp  			on update current_timestamp,
	alh_status 					bit 				not null,
	alh_date_created			timestamp			not null default current_timestamp,
	alh_date_updated			timestamp			not null default current_timestamp on update current_timestamp
);

create table tb_users
(
	user_id						bigint				unsigned not null,
	ru_id						bigint				unsigned not null,
	user_first_name				varchar(66)			not null,
	user_last_name				varchar(66)			not null,
	user_user_name				varchar(66)			not null unique,
	user_email					varchar(66)			not null unique,
	user_password				varchar(66)			not null,
	user_remember_token			varchar(666)		default null,	
	user_phone					varchar(66)			not null,
	user_nation					varchar(66)			not null,
	user_address				varchar(666)		not null,
	user_date_of_birth			date				not null,
	user_date_created			timestamp			not null default current_timestamp,
	user_date_updated			timestamp			not null default current_timestamp on update current_timestamp
);

create table tb_user_login_history
(
	ulh_id 						bigint 				unsigned not null,
	user_id 					bigint 				unsigned not null,
	ulh_ip 						varchar(66)  		not null,
	ulh_login_time 				timestamp 			not null default current_timestamp,
	ulh_logout_time				timestamp  			on update current_timestamp,
	ulh_status 					bit 				not null,
	ulh_date_created			timestamp			not null default current_timestamp,
	ulh_date_updated			timestamp			not null default current_timestamp on update current_timestamp
);

create table tb_categories
(
	cate_id						bigint				unsigned not null,
	cate_url					varchar(66)			not null,
	cate_name					varchar(66)			not null,
	cate_detail					varchar(666)		not null,
	cate_date_created			timestamp			not null default current_timestamp,
	cate_date_updated			timestamp			not null default current_timestamp on update current_timestamp
);

create table tb_subcategories
(
	subcate_id					bigint				unsigned not null,
	cate_id 					bigint				unsigned not null,
	subcate_url					varchar(66)			not null,
	subcate_name				varchar(66)			not null,
	subcate_detail				varchar(666)		not null,
	subcate_date_created		timestamp			not null default current_timestamp,
	subcate_date_updated		timestamp			not null default current_timestamp on update current_timestamp
);

create table tb_brands
(
	brand_id					bigint				unsigned not null,
	brand_url					varchar(66)			not null,
	brand_name					varchar(66)			not null,
	brand_detail				varchar(666)		not null,
	brand_date_created			timestamp			not null default current_timestamp,
	brand_date_updated			timestamp			not null default current_timestamp on update current_timestamp
);

create table tb_calculation_unit
(
	cu_id						bigint				unsigned not null,
	cu_name						varchar(66)			not null,
	cu_detail					varchar(666)		default null,
	cu_date_created				timestamp			not null default current_timestamp,
	cu_date_updated				timestamp			not null default current_timestamp on update current_timestamp
);

create table tb_products
(
	prod_id						bigint				unsigned not null,
	subcate_id					bigint				unsigned not null,
	brand_id					bigint				unsigned not null,
	cu_id 						bigint				unsigned not null,
	prod_url					varchar(666)		not null,
	prod_name					varchar(666)		not null,
	prod_detail					text				not null,
	prod_price					decimal(18,0)		not null check (prod_price >= 0),
	prod_sale_price				decimal(18,0)		not null,
	prod_image					varchar(66)			not null,
	prod_availability			bit					not null,
	prod_quantity				bigint				not null,
	prod_date_of_manufacture	date				default null,
	prod_date_created			timestamp			not null default current_timestamp,
	prod_date_updated			timestamp			not null default current_timestamp on update current_timestamp
);

create table tb_product_images
(
	pi_id 						bigint 				unsigned not null,
	prod_id						bigint 				unsigned not null,
	pi_name						varchar(66)			not null,
	pi_date_created				timestamp			not null default current_timestamp,
	pi_date_updated				timestamp			not null default current_timestamp on update current_timestamp
);

create table tb_product_reviews
(
	pr_id 						bigint 				unsigned not null,
	user_id						bigint 				unsigned not null,
	prod_id						bigint 				unsigned not null,
	pr_star						int(1)				unsigned not null check (pr_star <= 5),
	pr_content					varchar(666)		not null,
	pr_date_created				timestamp			not null default current_timestamp,
	pr_date_updated				timestamp			not null default current_timestamp on update current_timestamp
);

create table tb_carts
(
	cart_id						bigint				unsigned not null,
	user_id						bigint				unsigned not null unique,
	cart_date_created			timestamp			not null default current_timestamp,
	cart_date_updated 			timestamp			not null default current_timestamp on update current_timestamp
);

create table tb_cart_products
(
	cp_id 						bigint				not null,
	cart_id						bigint				unsigned not null,
	prod_id						bigint				unsigned not null,
	cp_quantity					bigint				not null,
	cp_price					decimal(18,0)		not null check (cp_price >= 0),
	cp_date_created				timestamp			not null default current_timestamp,
	cp_date_updated				timestamp			not null default current_timestamp on update current_timestamp
);

create table tb_favorites
(
	favo_id						bigint 				unsigned not null,
	user_id 					bigint 				unsigned not null unique,
	favo_date_created			timestamp			not null default current_timestamp,
	favo_date_updated			timestamp			not null default current_timestamp on update current_timestamp
);

create table tb_favorite_products
(
	fp_id 						bigint				unsigned not null,
	favo_id						bigint 				unsigned not null,
	prod_id 					bigint 				unsigned not null,
	fp_date_created				timestamp			not null default current_timestamp,
	fp_date_updated 			timestamp			not null default current_timestamp on update current_timestamp
);

create table tb_bill_statuses
(
	bs_id 						bigint				unsigned not null,
	bs_name 					varchar(66) 		not null,
	bs_detail					varchar(666)		default null,
	fd_date_created				timestamp			not null default current_timestamp,
	fd_date_updated				timestamp			not null default current_timestamp on update current_timestamp
);

create table tb_payment_types
(
	pt_id 						bigint				unsigned not null,
	pt_name 					varchar(66) 		not null,
	pt_detail					varchar(666)		default null,
	pt_date_created				timestamp			not null default current_timestamp,
	pt_date_updated				timestamp			not null default current_timestamp on update current_timestamp
);

create table tb_bills
(
	bill_id						bigint				unsigned not null,
	user_id						bigint				unsigned not null,
	bs_id 						bigint				unsigned not null,
	pt_id 						bigint				unsigned not null,
	bill_first_name				varchar(66)			not null,
	bill_last_name				varchar(66)			not null,
	bill_email					varchar(66)			not null,
	bill_phone					varchar(66)			not null,
	bill_nation					varchar(66)			not null,
	bill_address				varchar(666)		not null,
	bill_note 					varchar(666)		not null,
	bill_date_order				date				not null,
	bill_date_delivery			date				not null,
	bill_approved				bit					not null,
	bill_paid					bit					not null,
	bill_delivered				bit					not null,
	bill_transportation_costs	decimal(18,0)		not null check (bill_transportation_costs >= 0),
	bill_date_created			timestamp			not null default current_timestamp,
	bill_date_updated 			timestamp			not null default current_timestamp on update current_timestamp
);

create table tb_bill_products
(
	bp_id 						bigint				unsigned not null,
	bill_id						bigint				unsigned not null,
	prod_id						bigint				unsigned not null,
	bp_quantity					bigint				not null,
	bp_price					decimal(18,0)		not null check (bp_price >= 0),
	bp_date_created				timestamp			not null default current_timestamp,
	bp_date_updated 			timestamp			not null default current_timestamp on update current_timestamp
);


alter table tb_slide
	add constraint pk_slide primary key (slide_id);

alter table tb_news
	add constraint pk_news primary key (news_id);

alter table tb_role_user
	add constraint pk_role_user primary key (ru_id);

alter table tb_role_admin
	add constraint pk_role_admin primary key (ra_id);

alter table tb_administrators
	add constraint pk_administrator primary key (admin_id);

alter table tb_admin_login_history
	add constraint pk_admin_login_history primary key (alh_id);

alter table tb_users
	add constraint pk_user primary key (user_id);

alter table tb_user_login_history
	add constraint pk_user_login_history primary key (ulh_id);

alter table tb_categories
	add constraint pk_category primary key (cate_id);

alter table tb_subcategories
	add constraint pk_subcategory primary key (subcate_id);

alter table tb_brands
	add constraint pk_brand primary key (brand_id);

alter table tb_calculation_unit
	add constraint pk_calculation_unit primary key (cu_id);

alter table tb_products
	add constraint pk_product primary key (prod_id);

alter table tb_product_images
	add constraint pk_product_image primary key (pi_id);

alter table tb_product_reviews
	add constraint pk_product_review primary key (pr_id);

alter table tb_carts
	add constraint pk_cart primary key (cart_id);

alter table tb_cart_products
	add constraint pk_cart_product primary key (cp_id);

alter table tb_favorites
	add constraint pk_favorite primary key (favo_id);

alter table tb_favorite_products
	add constraint pk_favorite_product primary key (fp_id);

alter table tb_bill_statuses
	add constraint pk_bill_status primary key (bs_id);

alter table tb_payment_types
	add constraint pk_payment_type primary key (pt_id);

alter table tb_bills
	add constraint pk_bill primary key (bill_id);

alter table tb_bill_products
	add constraint pk_bill_product primary key (bp_id);


alter table tb_slide
	modify column slide_id bigint unsigned not null auto_increment;

alter table tb_news
	modify column news_id bigint unsigned not null auto_increment;

alter table tb_role_user
	modify column ru_id bigint unsigned not null auto_increment;

alter table tb_role_admin
	modify column ra_id bigint unsigned not null auto_increment;

alter table tb_admin_login_history
	modify column alh_id bigint unsigned not null auto_increment;

alter table tb_user_login_history
	modify column ulh_id bigint unsigned not null auto_increment;

alter table tb_calculation_unit
	modify column cu_id bigint unsigned not null auto_increment;

alter table tb_product_images
	modify column pi_id bigint unsigned not null auto_increment;

alter table tb_product_reviews
	modify column pr_id bigint unsigned not null auto_increment;

alter table tb_bill_statuses
	modify column bs_id bigint unsigned not null auto_increment;

alter table tb_payment_types
	modify column pt_id bigint unsigned not null auto_increment;

alter table tb_administrators
	modify column admin_id bigint unsigned not null auto_increment;

alter table tb_users
	modify column user_id bigint unsigned not null auto_increment;

alter table tb_categories
	modify column cate_id bigint unsigned not null auto_increment;

alter table tb_subcategories
	modify column subcate_id bigint unsigned not null auto_increment;

alter table tb_brands
	modify column brand_id bigint unsigned not null auto_increment;

alter table tb_products
	modify column prod_id bigint unsigned not null auto_increment;

alter table tb_carts
	modify column cart_id bigint unsigned not null auto_increment;

alter table tb_cart_products
	modify column cp_id bigint unsigned not null auto_increment;

alter table tb_favorites
	modify column favo_id bigint unsigned not null auto_increment;

alter table tb_favorite_products
	modify column fp_id bigint unsigned not null auto_increment;

alter table tb_bills
	modify column bill_id bigint unsigned not null auto_increment;

alter table tb_bill_products
	modify column bp_id bigint unsigned not null auto_increment;


alter table tb_news
	add constraint fk_administrator_news foreign key (admin_id) references tb_administrators (admin_id);

alter table tb_administrators
	add constraint fk_role_admin_administrator foreign key (ra_id) references tb_role_admin (ra_id);

alter table tb_admin_login_history
	add constraint fk_administrator_admin_login_history foreign key (admin_id) references tb_administrators (admin_id);

alter table tb_users
	add constraint fk_role_user_user foreign key (ru_id) references tb_role_user (ru_id);

alter table tb_user_login_history
	add constraint fk_user_user_login_history foreign key (user_id) references tb_users (user_id);

alter table tb_subcategories
	add constraint fk_category_subcategory foreign key (cate_id) references tb_categories (cate_id);

alter table tb_products
	add constraint fk_subcategory_product foreign key (subcate_id) references tb_subcategories (subcate_id),
	add constraint fk_brand_product foreign key (brand_id) references tb_brands (brand_id),
	add constraint fk_calculation_unit_product foreign key (cu_id) references tb_calculation_unit (cu_id);

alter table tb_product_reviews
	add constraint fk_user_product_review foreign key (user_id) references tb_users (user_id),
	add constraint fk_product_product_review foreign key (prod_id) references tb_products (prod_id);

alter table tb_product_images
	add constraint fk_product_product_images foreign key (prod_id) references tb_products (prod_id);

alter table tb_carts
	add constraint fk_user_cart foreign key (user_id) references tb_users (user_id);

alter table tb_cart_products
	add constraint fk_cart_cart_product foreign key (cart_id) references tb_carts (cart_id),
	add constraint fk_product_cart_product foreign key (prod_id) references tb_products (prod_id);

alter table tb_favorites
	add constraint fk_user_favorite foreign key (user_id) references tb_users (user_id);

alter table tb_favorite_products
	add constraint fk_favorite_favorite_product foreign key (favo_id) references tb_favorites (favo_id),
	add constraint fk_product_favorite_product foreign key (prod_id) references tb_products (prod_id);

alter table tb_bills
	add constraint fk_user_bill foreign key (user_id) references tb_users (user_id),
	add constraint fk_bill_status_bill foreign key (bs_id) references tb_bill_statuses (bs_id),
	add constraint fk_payment_type_bill foreign key (pt_id) references tb_payment_types (pt_id);

alter table tb_bill_products
	add constraint fk_bill_bill_product foreign key (bill_id) references tb_bills (bill_id),
	add constraint fk_product_bill_product foreign key (prod_id) references tb_products (prod_id);