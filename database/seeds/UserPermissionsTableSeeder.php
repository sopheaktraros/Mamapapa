<?php

use Illuminate\Database\Seeder;

class UserPermissionsTableSeeder extends Seeder {
    public function getPermissions() {
        return [
	        ['id' => 1, 'name' => 'order_with_company', 'label' => 'Order', 'write' => 0, 'delete' => 0],
	        ['id' => 2, 'name' => "wrong_trucking_number", 'label' => 'Wrong TK', 'write' => 0, 'delete' => 0],
			['id' => 3, 'name' => "stock_order", 'label' => 'Stock Order', 'write' => 0, 'delete' => 0],
			['id' => 4, 'name' => "bargaining", 'label' => 'Bargaining', 'write' => 1, 'delete' => 1],
			['id' => 5, 'name' => "delivery", 'label' => 'Delivery', 'write' => 0, 'delete' => 0],
			['id' => 6, 'name' => "need_delivery", 'label' => 'Need Delivery', 'write' => 0, 'delete' => 0],
			['id' => 7, 'name' => "delivery_man", 'label' => 'Delivery Man', 'write' => 1, 'delete' => 1],
			['id' => 8, 'name' => "payments", 'label' => 'Payment', 'write' => 0, 'delete' => 0],
			['id' => 9, 'name' => "account_summary", 'label' => 'Account Summary', 'write' => 0, 'delete' => 0],
			['id' => 10, 'name' => "auditor", 'label' => 'Auditor', 'write' => 0, 'delete' => 0],
			['id' => 11, 'name' => "customer", 'label' => 'Customer', 'write' => 0, 'delete' => 0],
			['id' => 12, 'name' => "website", 'label' => 'Website', 'write' => 0, 'delete' => 0],
			// ['id' => 13, 'name' => "report", 'label' => 'Report', 'write' => 0, 'delete' => 0],
			['id' => 13, 'name' => "security", 'label' => 'Security', 'write' => 0, 'delete' => 0],
			['id' => 14, 'name' => "setting", 'label' => 'Settings', 'write' => 0, 'delete' => 0],

	        // Order
	        ['name' => "pending_audit", 'label' => 'Pending Audit', 'parent' => 1],
	        ['name' => "pending_payment", 'label' => 'Pending Payment', 'parent' => 1],
	        ['name' => "be_ordered", 'label' => 'Be Ordered', 'parent' => 1],
			['name' => "done", 'label' => 'Success Payment', 'parent' => 1],
			['name' => "close_order", 'label' => 'Close Order', 'parent' => 1],
			['name' => "cancel", 'label' => 'Cancel', 'parent' => 1],
			['name' => "refund_order", 'label' => 'Refund Order', 'parent' => 1],
			['name' => "company_verify", 'label' => 'Verify', 'parent' => 1],
			['name' => "company_receiving", 'label' => 'Receiving (Land & Sea)', 'parent' => 1],
			['name' => "company_receiving_by_air", 'label' => 'Receiving (Air)', 'parent' => 1],
			['name' => "company_stock", 'label' => 'Arrive In Stock', 'parent' => 1],
			['name' => "can_open", 'label' => 'Can Open', 'parent' => 1],
			
			//Wrong TK
	        ['name' => "wrong_tk_order", 'label' => 'Order', 'parent' => 2],
			['name' => "wrong_tk_verify", 'label' => 'Verify', 'parent' => 2],
			['name' => "wrong_tk_reveiving", 'label' => 'Receiving', 'parent' => 2],

			// Stock Order
			['name' => "stock_pending_audit", 'label' => 'Pending Audit', 'parent' => 3],
			['name' => "stock_pending_payment", 'label' => 'Pending Payment', 'parent' => 3],
			['name' => "stock_be_ordered", 'label' => 'Be Ordered', 'parent' => 3],
			['name' => "stock_done", 'label' => 'Success Payment', 'parent' => 3],
			['name' => "stock_can_open", 'label' => 'Can Open', 'parent' => 3],
			['name' => "stock_close_order", 'label' => 'Close Order', 'parent' => 3],
			['name' => "stock_cancel", 'label' => 'Cancel', 'parent' => 3],
			['name' => "stock_refund_order", 'label' => 'Refund Order', 'parent' => 3],

	        // Delivery
			['name' => "delivery_pending", 'label' => 'Pending', 'parent' => 5],
			['name' => "delivery_return", 'label' => 'Return', 'parent' => 5],
			['name' => "delivery_paid", 'label' => 'Paid', 'parent' => 5],
			['name' => "delivery_done", 'label' => 'Done', 'parent' => 5],

	        // Need Delivery
			['name' => "need_del_pending", 'label' => 'Pending', 'parent' => 6],
			['name' => "need_del_return", 'label' => 'Return', 'parent' => 6],
			['name' => "need_del_paid", 'label' => 'Paid', 'parent' => 6],
			['name' => "need_del_done", 'label' => 'Done', 'parent' => 6],

			// Payment
			['name' => "payment", 'label' => 'Payment Form', 'parent' => 8],
			['name' => "petty_cash", 'label' => 'Petty Cash', 'parent' => 8],
	
			// Account Summary
			['name' => "cash_in", 'label' => 'Cash In', 'parent' => 9],
			['name' => "cash_out", 'label' => 'Cash Out', 'parent' => 9],
			['name' => "ending_balance", 'label' => 'Ending Balance', 'parent' => 9],

			// Auditor
			['name' => "auditor_deposit_balance", 'label' => 'Deposit', 'parent' => 10],
			['name' => "auditor_withdraw", 'label' => 'Withdraw', 'parent' => 10],

			// Customer
			['name' => "customers", 'label' => 'Customer', 'parent' => 11],
			['name' => "customer_deposit_balance", 'label' => 'Deposit', 'parent' => 11],
			['name' => "withdraw", 'label' => 'Withdraw', 'parent' => 11],

			// Website
			// ['name' => "news", 'label' => 'News', 'parent' => 8],
			['name' => "ordered_product", 'label' => 'Ordered Product', 'parent' => 12],
			['name' => "location", 'label' => 'Location', 'parent' => 12],
			['name' => "product", 'label' => 'Product', 'parent' => 12],
			['name' => "product_category", 'label' => 'Product Category', 'parent' => 12],
			['name' => "brand", 'label' => 'Brand', 'parent' => 12],
			['name' => "slider", 'label' => 'Silder', 'parent' => 12],
			['name' => "home_page", 'label' => 'Home Page', 'parent' => 12],
			['name' => "about_us", 'label' => 'About Us', 'parent' => 12],
			['name' => "help_center", 'label' => 'Help Center', 'parent' => 12],

			// // Report
			// ['name' => "delivery_report", 'label' => 'Delivery', 'parent' => 9],
			// ['name' => "purchashing_report", 'label' => 'Purchasing', 'parent' => 9],
			// ['name' => "shipping_report", 'label' => 'Shipping', 'parent' => 9],
			// ['name' => "wrong_tk_report", 'label' => 'Wrong TN', 'parent' => 9],

	        // Security
	        ['name' => "user", 'label' => 'User', 'parent' => 13],
	        ['name' => "role", 'label' => 'Role', 'parent' => 13],

	        // Settings
	        ['name' => "general", 'label' => 'General', 'parent' => 14],
	        // ['name' => "trainer", 'label' => 'Trainer', 'parent' => 11],

        ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $permissions = $this->getPermissions();

        foreach ( $permissions as $permission ) {
            DB::table( 'user_permissions' )->insert( [
                'name' => $permission['name'],
                'label' => $permission['label'],
                'read' => isset($permission['read']) ? $permission['read'] : 1,
                'write' => isset($permission['write']) ? $permission['write'] : 1,
                'delete' => isset($permission['delete']) ? $permission['delete'] : 1,
                'parent' => isset($permission['parent']) ? $permission['parent'] : NULL,
            ] );
        }
    }
}
