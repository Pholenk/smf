//==============//
//  login page  //
//==============//

$(document).ready(
	$('#login').submit(function() {
		$.ajax({
			type: 'post',
			url:'/auth/login',
			data:{
				email: $('#email').val(), 
				password: $('#password').val()
			},
			success:function(response) {
				response === 'TRUE' ? window.location = '/users/' : window.location = '/auth'
			}
		})
	})
	)

//==============//
//  users page  //
//==============//
$(document).ready(function() {
	var id

	$("button[id^='edit_user_']").on('click', function() {
		id = this.id.replace("edit_user_", "")
		$.ajax({
			url: 'users/read/'+id,
			success: function(response) {
				response === '!LOGIN' ? window.location = '/auth' : $('.modal-content').html(response)
			}
		})
	})

	$('body').on('submit', '#edit_form_user', function() {
		id = this.id.replace("edit_form_user_", "")
		$.ajax({
			type: 'post',
			url: 'users/edit/'+id,
			data: $('#edit_form_user_'+id).serialize(),
			success: function(response) {
				response === 'SUCCESS' ? window.location = '/users/' : window.location = '/users'
			}
		})
	})

	$('#add_user').on('click',function() {
		$.ajax({
			url: 'users/add',
			success: function(response) {
				response === '!LOGIN' ? window.location = '/auth' : $('.modal-content').html(response)
			}
		})
	})
	
	$('body').on('submit', '#add_form_user', function() {
		$.ajax({
			type: 'post',
			url: 'users/add/',
			data: $('#add_form_user').serialize(),
			success: function(response) {
				response === 'SUCCESS' ? window.location = '/users/' : window.location = 'users/'
			}
		})
	})
})

//===================//
//  privileges page  //
//===================//

$(document).ready(function() {
	$('#user_priv').on('change', function() {
		if ($('#user_priv').val() !== '') {
			$.ajax({
				url: 'privileges/read/'+ $('#user_priv').val(),
				success: function(response) {
					response === '!LOGIN' ? window.location = '/auth' : $('#result').removeClass('hidden') && $('#result').html(response)
				}
			})
		}
		else{
			$('#result').addClass('hidden')
		}
	})
	
	$('#edit_priv').on('click', function() {
		if ($('#user_priv').val() !== '') {
			window.location = 'privileges/edit/'+ $('#user_priv').val()
		}
	})
})

//=======================//
//  std_production page  //
//=======================//

$(document).ready(function() {
	var id

	$("button[id^='edit_std_prod_']").on('click', function() {
		id = this.id.replace("edit_std_prod_", "")
		$.ajax({
			url: 'std_production/read/'+id,
			success: function(response) {
				response === '!LOGIN' ? window.location = '/auth' : $('.modal-content').html(response)
			}
		})
	})

	$('body').on('submit', '#edit_form_std_prod', function() {
		$.ajax({
			type: 'post',
			url: 'std_production/edit/'+id,
			data: $('#edit_form_std_prod').serialize(),
			success: function(response) {
				response === 'SUCCESS' ? window.location = '/std_production/' : window.location = '/users'
			}
		})
	})

	$('#add_std_prod').on('click',function() {
		$.ajax({
			url: 'std_production/add',
			success: function(response) {
				response === '!LOGIN' ? window.location = '/auth' : $('.modal-content').html(response)
			}
		})
	})
	
	$('body').on('keyup', "[id^='feed_']", function() {
		var fi = $("[id^='feed_']").val()
		var bb = $("[id^='berat_']").val()
		var result = fi / (bb * 1000)
		
		result !== '' ? $('[id^=fcr_]').html(result) : $('[id^=fcr_]').html(0)
	})

	$('body').on('submit', '#add_form_std_prod', function() {
		$.ajax({
			type: 'post',
			url: 'std_production/add/',
			data: $('#add_form_std_prod').serialize(),
			success: function(response) {
				response === 'SUCCESS' ? window.location = '/std_production/' : window.location = 'users/'
			}
		})
	})
})

//=================//
//  contract page  //
//=================//

$(document).ready(function() {
	var id
	var type_contract

	$("button[id^='edit_contract_']").click(function() {
		type_contract = this.id.replace('edit_contract_', '')
		id = type_contract.replace('_','/')
		console.log(id)
		$.ajax({
			url: 'contract/read/'+id,
			success: function (response) {
				response === '!LOGIN' ? window.location = '/auth' : $('.modal-content').html(response)
			}
		})
	})

	$("button[id^='add_contract_']").click(function() {
		type_contract = this.id.replace('add_contract_', '')
		console.log(type_contract)
		$.ajax({
			url: 'contract/add/'+type_contract,
			success: function (response) {
				response === '!LOGIN' ? window.location = '/auth' : $('.modal-content').html(response)
			}
		})
	})

	$('body').on('submit', '#edit_form_contract', function() {
		$.ajax({
			type: 'post',
			url: 'contract/edit/'+id,
			data: $('#edit_form_contract').serialize(),
			success: function(response) {
				response === 'success' ? window.location = '/contract/' : window.location = '/users'
			},
		})
	})

	$('body').on('submit', '#add_form_contract', function() {
		$.ajax({
			type: 'post',
			url: 'contract/add/'+type_contract,
			data: $('#add_form_contract').serialize(),
			success: function(response) {
				response === 'success' ? window.location = '/contract/' : window.location = '/users'
			},
		})
	})
})

//===================//
//  route_ring page  //
//===================//

$(document).ready(function() {
	var id
	$("button[id^='edit_route_ring_']").click(function() {
		id = this.id.replace('edit_route_ring_', '')
		$.ajax({
			url: 'route_ring/read/'+id,
			success: function (response) {
				response === '!LOGIN' ? window.location = '/auth' : $('.modal-content').html(response)
			}
		})
	})
	
	$("button[id^='add_route_ring']").click(function() {
			$.ajax({
				url: 'route_ring/add/',
				success: function (response) {
					response === '!LOGIN' ? window.location = '/auth' : $('.modal-content').html(response)
				}
			})
		})

	$('body').on('submit', '#add_form_route', function() {
		$.ajax({
			type: 'post',
			url: 'route_ring/add/',
			data: $('#add_form_route').serialize(),
			success: function(response) {
				response === 'success' ? window.location = '/contract/' : window.location = '/users'
			},
		})
	})

	$('body').on('submit', '#edit_form_route', function() {
		$.ajax({
			type: 'post',
			url: 'route_ring/edit/'+id,
			data: $('#edit_form_route').serialize(),
			success: function(response) {
				response === 'success' ? window.location = '/contract/' : window.location = '/users'
			},
		})
	})
})

//======================//
//  breeder_score page  //
//======================//

$(document).ready(function() {
	var id
	$("button[id^='edit_breeder_score_']").click(function() {
		id = this.id.replace('edit_breeder_score_', '')
		$.ajax({
			url: 'breeder_score/read/'+id,
			success: function (response) {
				response === '!LOGIN' ? window.location = '/auth' : $('.modal-content').html(response)
			}
		})
	})
	
	$("button[id^='add_breeder_score']").click(function() {
			$.ajax({
				url: 'breeder_score/add/',
				success: function (response) {
					response === '!LOGIN' ? window.location = '/auth' : $('.modal-content').html(response)
				}
			})
		})

	$('body').on('submit', '#add_form_breeder_score', function() {
		$.ajax({
			type: 'post',
			url: 'breeder_score/add/',
			data: $('#add_form_breeder_score').serialize(),
			success: function(response) {
				response === 'success' ? window.location = '/breeder_score/' : window.location = '/users'
			},
		})
	})

	$('body').on('submit', '#edit_form_breeder_score', function() {
		$.ajax({
			type: 'post',
			url: 'breeder_score/edit/'+id,
			data: $('#edit_form_breeder_score').serialize(),
			success: function(response) {
				response === 'success' ? window.location = '/breeder_score/' : window.location = '/users'
			},
		})
	})
})



//=====================//
//  tech_support page  //
//=====================//
$(document).ready(function() {
	var id

	$("button[id^='edit_tech_support_']").click(function() {
		id = this.id.replace('edit_tech_support_', '')
		$.ajax({
			url: 'tech_support/read/'+id,
			success: function (response) {
				response === '!LOGIN' ? window.location = '/auth' : $('.modal-content').html(response)
			}
		})
	})

	$("button[id^='add_tech_support_']").click(function() {
		$.ajax({
			url: 'tech_support/add/',
			success: function (response) {
				response === '!LOGIN' ? window.location = '/auth' : $('.modal-content').html(response)
			}
		})
	})

	$('body').on('submit', '#add_form_tech_support', function() {
		$.ajax({
			type: 'post',
			url: 'tech_support/add/',
			data: $('#add_form_tech_support').serialize(),
			success: function(response) {
				response === 'success' ? window.location = '/tech_support/' : window.location = '/users'
			},
		})
	})

	$('body').on('submit', '#edit_form_tech_support', function() {
		$.ajax({
			type: 'post',
			url: 'tech_support/edit/'+id,
			data: $('#edit_form_tech_support').serialize(),
			success: function(response) {
				response === 'success' ? window.location = '/tech_support/' : window.location = '/users'
			},
		})
	})
})

//=================//
//  supplier page  //
//=================//
$(document).ready(function() {
	var id

	$('body').on('click', "button[id^='edit_supplier_']", function() {
		id = this.id.replace('edit_supplier_', '')
		$.ajax({
			url: 'supplier/read/'+id,
			success: function (response) {
				response === '!LOGIN' ? window.location = '/auth' : $('.modal-content').html(response)
			}
		})
	})

	$('body').on('click', "button[id^='add_supplier']", function() {
		$.ajax({
			url: 'supplier/add/',
			success: function (response) {
				response === '!LOGIN' ? window.location = '/auth' : $('.modal-content').html(response)
			}
		})
	})

	$('body').on('submit', '#add_form_supplier', function() {
		$.ajax({
			type: 'post',
			url: 'supplier/add/',
			data: $('#add_form_supplier').serialize(),
			success: function(response) {
				response === 'success' ? window.location = '/supplier/' : window.location = '/users'
			},
		})
	})

	$('body').on('submit', '#edit_form_supplier', function() {
		$.ajax({
			type: 'post',
			url: 'supplier/edit/'+id,
			data: $('#edit_form_supplier').serialize(),
			success: function(response) {
				response === 'success' ? window.location = '/supplier/' : window.location = '/users'
			},
		})
	})

	$('#supplier_search').keyup(function() {
		$.ajax({
			url: 'supplier/search/' + $('#supplier_search').val(),
			success: function(result) {
				$('#supplier-result').html(result)
			}
		})
	})
})

//=========================//
//  supplier_product page  //
//=========================//
$(document).ready(function() {
	var id

	$('#supplier_data').on('change', function() {
		if ($('#supplier_data').val() !== '') {
			$.ajax({
				url: 'supplier_product/read/'+ $('#supplier_data').val(),
				success: function(response) {
					response === '!LOGIN' ? window.location = '/auth' : $('#result').removeClass('hidden') && $('#result').html(response)
				}
			})
		}
		else{
			$('#result').addClass('hidden')
		}
	})

	$('body').on('click', "button[id^='edit_supplier_product_']", function() {
		id = this.id.replace('edit_supplier_product_', '')
		console.log(id)
		$.ajax({
			url: 'supplier_product/read/'+id,
			success: function (response) {
				response === '!LOGIN' ? window.location = '/auth' : $('.modal-content').html(response)
			}
		})
	})

	$("button[id^='add_supplier_product']").click(function() {
		$.ajax({
			url: 'supplier_product/add/',
			success: function (response) {
				response === '!LOGIN' ? window.location = '/auth' : $('.modal-content').html(response)
			}
		})
	})

	$('body').on('submit', '#add_form_supplier_product', function() {
		$.ajax({
			type: 'post',
			url: 'supplier_product/add/',
			data: $('#add_form_supplier_product').serialize(),
			success: function(response) {
				response === 'success' ? window.location = '/supplier_product/' : window.location = '/users'
			},
		})
	})

	$('body').on('submit', '#edit_form_supplier_product', function() {
		$.ajax({
			type: 'post',
			url: 'supplier_product/edit/'+id,
			data: $('#edit_form_supplier_product').serialize(),
			success: function(response) {
				response === 'success' ? window.location = '/supplier_product/' : window.location = '/users'
			},
		})
	})
})

//=========================//
//  breeder page  //
//=========================//
$(document).ready(function() {
	var id

	$("button[id^='edit_breeder_']").click(function() {
		id = this.id.replace('edit_breeder_','');
		$.ajax({
			url: 'breeder/read/'+id,
			success: function (response) {
				response === '!LOGIN' ? window.location = '/auth' : $('.modal-content').html(response)
			}
		})
	})

	$('body').on('change', "select[id^='kelurahan_']", function() {
		id_route = $("select[id^='kelurahan_']").val()
		if (id_route === ''){
			$("label[id^='ring_'").html(0) && $("label[id^='route_']").html(0)
		} else{
			$.ajax({
				dataType: 'json',
				url: 'breeder/read_route/'+id_route,
				success: function (result) {
					console.log(result)
					result !== '!LOGIN' ? $("label[id^='ring_'").html(result.ring) && $("label[id^='route_']").html(result.route) : window.location = '/auth'
				}
			})
		}
	})

	$('body').on('click', "button[id^='edit_breeder_']", function() {
		id = this.id.replace('edit_breeder_', '')
		console.log(id)
		$.ajax({
			url: 'breeder/read/'+id,
			success: function (response) {
				response === '!LOGIN' ? window.location = '/auth' : $('.modal-content').html(response)
			}
		})
	})

	$("button[id^='add_breeder']").click(function() {
		$.ajax({
			url: 'breeder/add/',
			success: function (response) {
				response === '!LOGIN' ? window.location = '/auth' : $('.modal-content').html(response)
			}
		})
	})

	$('body').on('submit', '#add_form_breeder', function() {
		$.ajax({
			type: 'post',
			url: 'breeder/add/',
			data: $('#add_form_breeder').serialize(),
			success: function(response) {
				response === 'success' ? window.location = '/breeder/' : window.location = '/users'
			},
		})
	})

	$('body').on('submit', '#edit_form_breeder', function() {
		$.ajax({
			type: 'post',
			url: 'breeder/edit/'+id,
			data: $('#edit_form_breeder').serialize(),
			success: function(response) {
				response === 'success' ? window.location = '/breeder/' : window.location = '/users'
			},
		})
	})
})