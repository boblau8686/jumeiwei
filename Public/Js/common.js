/**
 * 公共函数库
 */

// 预订的所有菜品
var orderFoodList = {};
/**
 * 添加菜品到预订的菜单中
 * @param object d 
 */
function updateCart(d) {
	if (typeof d == 'object') {
		orderFoodList = d;
	}
	var h = createCartList(orderFoodList);
	$('.order_foot_list').html(h);
	
	// 计算总价格
	var totalPrice = 0;
	for (var i in orderFoodList) {
		if (orderFoodList[i] != undefined) {
			totalPrice += orderFoodList[i]['count'] * orderFoodList[i]['price'];
		}
	}
	$('#totalPrice').html(totalPrice);
}

function addToCart(id) {
	var namePrice = getNamePrice(id);
	var url = '/business/cartadd/foodid/' + namePrice['id']; 
	$.post(url, function(d){
		if (!orderFoodList[id]) {
			orderFoodList[id] = namePrice;
			orderFoodList[id]['count'] = 1;
		} else {
			orderFoodList[id]['count'] += 1;
		}
		updateCart(orderFoodList);
	});
}

/**
 * 点击预订按钮的时候,获取菜品名字和价格
 * @param id int
 * @returns json
 */
function getNamePrice(id) {
	var e = $('.menu_' + id);
	var foodName = e.find('td.food_name').text();
	var foodPrice = parseFloat(e.find('td.food_price font').text());
	return {"id": id, "name": foodName, "price": foodPrice};
}

/**
 * 创建预订的菜单列表的html
 * @param d json
 * @returns string html element
 */
function createCartList(d) {
	var h = '';
	for (var i in d) {
		if (d[i] != undefined) {
			h += '<li id="order_item' + d[i].id + '">';
			h += '<font>' + d[i].name + '</font>';
			h += '<span class="subtract" onclick="subtract(' + d[i].id + ')"> - </span>';
			h += '<input type="text" size="2" value="' + d[i].count + '" />';
			h += '<span class="add"> + </span>';
			h += '<font>份</font><font>￥' + d[i].price + '</font></li>';
		}
	}
	return h;
}

/**
 * 把预订的菜品减1
 * @param id
 */
function subtract(id) {
	var url = '/business/cartdel/foodid/' + id;
	$.post(url, function(){
		if (typeof orderFoodList[id] == 'object' && orderFoodList[id]['count'] <= 1) {
			delete orderFoodList[id];
		} else {
			orderFoodList[id]['count'] -= 1;
		}
		updateCart(orderFoodList);
	});
}
