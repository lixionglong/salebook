# salebook
PHP+MYSQL图书销售管理系统<br>
该系统分为普通用户和管理员用户两个权限<br>
1.普通用户权限可以查看书籍信息，并且购买书籍，修改个人资料，结算等功能<br>
2.管理员权限可以查看修改和删除所有书籍信息，并且可以添加信息，对所有用户进行管理，修改和删除用户资料，查询订单，删除订单<br>
查询书籍总销售数量，按年份和月份查找特定年月和月份的图书销售情况<br>
3.mysql数据库后台有七张表<br>
1.用户信息（users）:(userid,username,password,sex,tel,zcdate,addr)<br>
2.管理员信息表（admins）：（account，password）<br>
3.图书信息表（bookinfo）：（bookid，bookname，typeid，author，publish，cbdate，number，price，pic）<br>
4.图书类型表（booktype）：（typeid，typename）<br>
5.订单表（orders）：（orderid，userid，bookid，number，total）<br>
6.图书销售表（sale）：（saleid，bookid，number，saledate）<br>
7.购物车表（usercart）：（userid，orderid）<br>
3.4数据字典<br>
3.4.1数据项<br>
编号	 数据项名称	数据类型	备注<br>
1	userid	Int	用户ID，有唯一值，不能为空<br>
2	username	varchar(20)	用户名，有唯一值，不能为空<br>
3	user.password	varchar(20)	用户密码，不能为空<br>
4	sex	varchar(2)	用户性别，默认为男<br>
5	tel	varchar(20)	用户联系方式，不能为空<br>
6	zcdate	Date	用户注册时间，不能为空<br>
7	addr	varchar(20)	收货地址，不能为空<br>
8	account	Varchar(20)	管理员账户，有唯一值，不能为空<br>
9	admins.password	Varchar(20)	管理员密码，不能为空<br>
10	bookid	int	图书编号，有唯一值，不能为空<br>
11	bookname	varchar(20)	图书名称，不能为空<br>
12	typeid	int	图书类型编号，有唯一值，不能为空<br>
13	author	varchar(20)	作者，不能为空<br>
14	publish	varchar(20)	出版社，不能为空<br>
15	cbdate	date	出版日期，不能为空<br>
16	bookinfo.number	int	图书剩余量，不能为空<br>
17	price	float	图书价格，不能为空<br>
18	pic	Varchar(20)	图书图片路径<br>
19	typename	varchar(20)	图书类型名称，不能为空<br>
20	orderid	int	订单号，有唯一值，不能为空<br>
21	orders.number	int	购买数量，不为空<br>
22	total	float	书本总价<br>
23	saleid	int	销售号，有唯一值，不能为空<br>
24	sale.number	int	书本销售数量<br>
25	saledate	date	销售日期，不能为空<br>
