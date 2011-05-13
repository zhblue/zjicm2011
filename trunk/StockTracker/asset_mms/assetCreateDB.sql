drop database if exists assetDB;

create database assetDB;
use assetDB;

-- 权限表
drop table if exists popedom;
create table popedom(

	popedom_id			int(4)			primary key     auto_increment,			-- 权限ID
	popedom_name		varchar(10)		not null,								-- 权限名称
	popedom_path		varchar(20)		not null,								-- 权限路径
	popedom_pam			varchar(20)		not null								-- 权限参数

);

-- 角色表
drop table if exists role;
create table role(

	role_id				int(4)			primary key		auto_increment,			-- 角色ID
	role_name			varchar(20)     not null								-- 角色名			

);

-- 角色权限表
drop table if exists role_popedom;
create table role_popedom(
	role_id				int(4),													-- 角色ID
	popedom_id			int(4),													-- 权限ID
	FOREIGN KEY (role_id)				REFERENCES 		role(role_id),			-- 外键连接角色表
	FOREIGN KEY (popedom_id) 			REFERENCES 		popedom(popedom_id)		-- 外键连接权限表	
);

-- 用户表
drop table if exists t_user;
create table t_user(

	user_id			 	int(4)			primary key		auto_increment,   		-- 用户ID
	user_name			varchar(20)		not null,								-- 用户名
	user_password		varchar(20)		not null,								-- 用户密码

	role_id				int(4),													-- 角色ID
	FOREIGN KEY (role_id) 		    REFERENCES 		role(role_id)				-- 外键约束

);
INSERT INTO `t_user` VALUES ('1', 'ss', 'ss', null);

-- 员工表
drop table if exists employee;
create table employee(

	emp_id   			int(4)			primary key		auto_increment,			-- 员工ID
	emp_num				varchar(10)		not null,								-- 员工编号
	emp_name			varchar(10)		not null,								-- 员工姓名
	emp_manid			varchar(20)  	not null,								-- 员工身份证号
	emp_telnum			varchar(15)		not null		default '',				-- 员工手机号
	emp_sex				char(1)			not null		default '0',			-- 员工性别
	emp_email			varchar(20)		not null		default '',				-- 员工EMAIL
	emp_address			varchar(255)	not null		default '',				-- 员工住址
	
	user_id			int(4)			unique,                    					-- 与用户一对一对应关系的用户主键
	FOREIGN KEY (user_id) 		    REFERENCES 		t_user(user_id) 			-- 外键约束

);

-- 资产类型表
DROP TABLE IF EXISTS asset_type;
CREATE TABLE asset_type(
		
    asset_type_id		int(4)			primary key			auto_increment,		-- 资产类型id
	asset_type_number	varchar(10)		not null,								-- 资产类型编号
	asset_type_name		varchar(20)		not null,								-- 资产类型名称
	asset_type_decp		varchar(225)	not null			default ''			-- 资产类型描述
	
);

-- 资产表
drop table if exists asset;
create table asset(

	asset_id				int(4)				primary key		auto_increment,				-- 主键
	asset_number			varchar(10)			not null,									-- 编号
	asset_name				varchar(20)			not null,									-- 名称
	asset_use_type			char(2)				not null		default '0',				-- 使用类型(0为备用，1为购买后使用)
	asset_state				char(2)				not null		default '0', 				-- 状态(0为可用，1为已借出，2为申请借出，3为正修理，4为申请修理，5为申请报废，6为已报废,7为申请添加)
	asset_use_to_year		date				not null		default '2999-12-31',		-- 预计使用到的年限
	asset_use_time			varchar(20)			not null		default '',					-- 累计使用时间
	asset_buy_time			date				not null		default '1800-12-31',		-- 购买日期
	asset_factory			varchar(20)			not null		default '',					-- 厂家
	asset_model_type		varchar(20)			not null		default '',					-- 型号
	asset_price				double(10,2)		not null		default 0.0,				-- 价格
	
	emp_id   			    int(4),					                                        -- 员工
	asset_type_id			int(4),															-- 类型
	FOREIGN KEY(asset_type_id) 		REFERENCES 		asset_type(asset_type_id)，				-- 资产类型连接资产类型表asset_type_number
	FOREIGN KEY(emp_id) 	    	REFERENCES 		employee(emp_id )				        -- 负责人连接员工型表	
);

-- 申借表
drop table if exists borrow;
create table borrow(

    borrow_id							int(4)		primary key		auto_increment,			-- 主键				  
    borrow_time							date		not null,								-- 申借时间
    borrow_return_time_ap				date		not null		default '2999-12-31',	-- 预计归还时间
    borrow_return_time					date		not null		default '2999-12-31',	-- 归还时间
    borrow_borrowed_time				date		not null		default '2999-12-31',	-- 借出时间
    borrow_state                       varchar(10)  NOT NULL        default '',             -- 申借表状态 0：申借 1：审批 2：归还
    
    asset_id							int(4),												-- 资产ID
    borrow_admin_check					int(4),												-- 审批人ID
	user_id								int(4),												-- 申借人ID
	foreign key(asset_id)               references    asset(asset_id),                      -- 外键约束
	foreign key(user_id)               	references    employee(emp_id),						-- 外键约束
	foreign key(borrow_admin_check)		references    employee(emp_id)	                   	-- 外键约束

);

-- 报修表
DROP TABLE IF EXISTS fix;
CREATE TABLE fix (

	fix_id  						int(4) 			PRIMARY KEY 	auto_increment,				-- 主键id
	fix_report_time 				date 			NOT NULL,									-- 报修时间
	fix_time_pre					date			NOT NULL		default '2999-12-31',		-- 预计修完时间
	fix_time_return 				date			NOT NULL		default '2999-12-31',		-- 修缮时间
	fix_time_check				    date			NOT NULL		default '2999-12-31',		-- 审批时间
	fix_price						double(10,2)	NOT NULL		default 0.0,				-- 修理价格
	fix_check_factory				varchar(255)	NOT NULL		default '',					-- 修配厂商
	fix_reason						varchar(255)	NOT NULL		default '',					-- 故障原因
    fix_state                       varchar(10)     NOT NULL        default '',                 -- 报修表状态 0：报修 1：审批 2：修缮
	
	fix_report_id					int(4),														-- 报修人id
	asset_id						int(4),														-- 资产id
	fix_check_admin 				int(4),														-- 审批人id
	FOREIGN KEY(asset_id) 		    REFERENCES 		asset(asset_id),							-- 外键约束（资产id连接资产表主键id）
	FOREIGN KEY(fix_report_id) 		REFERENCES 		employee(emp_id),							-- 外键约束（报修人id连接员工表主键id）
	FOREIGN KEY(fix_check_admin)   	REFERENCES 		employee(emp_id) 							-- 外键约束（审批人id连接员工表主键id）

);







