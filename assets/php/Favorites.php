<?php



	namespace assets\php;

	use function error_reporting;
	use function ini_set;

	use function spl_autoload_register;

	use const E_ALL;

	error_reporting(E_ALL);
	ini_set('display_errors', 'On');

	spl_autoload_register();



	class Favorites {
		protected $cart_contents = [];

		public function __construct(){
			// get the shopping cart array from the session
			$this -> cart_contents = !empty($_SESSION['cart_contents'])? $_SESSION['cart_contents']: null;
			if ($this -> cart_contents === null){
				// set some base values
				$this -> cart_contents = ['cart_total' => 0, 'total_items' => 0];
			}
		}

		/**
		 * Cart Contents: Returns the entire cart array
		 *
		 * @param  bool
		 *
		 * @return    array
		 */
		public function contents(){
			// rearrange the newest first
			$cart = array_reverse($this -> cart_contents);

			// remove these so they don't create a problem when showing the cart table
			unset($cart['total_items']);
			unset($cart['cart_total']);

			return $cart;
		}

		/**
		 * Get cart item: Returns a specific cart item details
		 *
		 * @param  string  $row_id
		 *
		 * @return    array
		 */
		public function get_item($row_id){
			return (in_array($row_id, ['total_items', 'cart_total'], true) or !isset($this -> cart_contents[$row_id]))? false: $this -> cart_contents[$row_id];
		}

		/**
		 * Total Items: Returns the total item count
		 *
		 * @return    int
		 */
		public function total_items(){
			return $this -> cart_contents['total_items'];
		}

		/**
		 * Cart Total: Returns the total price
		 *
		 * @return    int
		 */
		public function total(){
			return $this -> cart_contents['cart_total'];
		}

		/**
		 * Insert items into the cart and save it to the session
		 *
		 * @param  array
		 *
		 * @return    bool
		 */
		public function insert($item = []){
			if (!is_array($item) or count($item) === 0){
				return false;
			} else {
				if (!isset($item['id'], $item['name'], $item['qty'])){
					return false;
				} else {
					/*
					 * Insert Item
					 */
					// prep the quantity
					$item['qty'] = (float) $item['qty'];
					if ($item['qty'] == 0){
						return false;
					}

					// create a unique identifier for the item being inserted into the cart
					$rowid = md5($item['id']);
					// get quantity if it's already there and add it on
					$old_qty = isset($this -> cart_contents[$rowid]['qty'])? (int) $this -> cart_contents[$rowid]['qty']: 0;
					// re-create the entry with unique identifier and updated quantity
					$item['rowid']                 = $rowid;
					$item['qty']                   += $old_qty;
					$this -> cart_contents[$rowid] = $item;

					// save Cart Item
					if ($this -> save_cart()){
						return isset($rowid)? $rowid: true;
					} else {
						return false;
					}
				}
			}
		}

		/**
		 * Update the cart
		 *
		 * @param  array
		 *
		 * @return    bool
		 */
		public function update($item = []){
			if (!is_array($item) or count($item) === 0){
				return false;
			} else {
				if (!isset($item['rowid'], $this -> cart_contents[$item['rowid']])){
					return false;
				} else {
					// prep the quantity
					if (isset($item['qty'])){
						$item['qty'] = (float) $item['qty'];
						// remove the item from the cart, if quantity is zero
						if ($item['qty'] == 0){
							unset($this -> cart_contents[$item['rowid']]);

							return true;
						}
					}

					// find updatable keys
					$keys = array_intersect(array_keys($this -> cart_contents[$item['rowid']]), array_keys($item));

					// product id & name shouldn't be changed
					foreach (array_diff($keys, ['id', 'name']) as $key){
						$this -> cart_contents[$item['rowid']][$key] = $item[$key];
					}
					// save cart data
					$this -> save_cart();

					return true;
				}
			}
		}

		/**
		 * Save the cart array to the session
		 *
		 * @return    bool
		 */
		protected function save_cart(){
			$this -> cart_contents['total_items'] = $this -> cart_contents['cart_total'] = 0;
			foreach ($this -> cart_contents as $key => $val){
				// make sure the array contains the proper indexes
				if (!is_array($val) or !isset($val['qty'])){
					continue;
				}

				$this -> cart_contents['total_items']    += $val['qty'];
				$this -> cart_contents[$key]['img'] = ($this -> cart_contents[$key][$this -> getImage()]);
			}

			// if cart empty, delete it from the session
			if (count($this -> cart_contents) <= 2){
				unset($_SESSION['cart_contents']);

				return false;
			} else {
				$_SESSION['cart_contents'] = $this -> cart_contents;

				return true;
			}
		}

		/**
		 * Remove Item: Removes an item from the cart
		 *
		 * @param  int
		 *
		 * @return    bool
		 */
		public function remove($row_id){
			// unset & save
			unset($this -> cart_contents[$row_id]);
			$this -> save_cart();

			return true;
		}

		/**
		 * Destroy the cart: Empties the cart and destroy the session
		 *
		 * @return    void
		 */
		public function destroy(){
			$this -> cart_contents = ['cart_total' => 0, 'total_items' => 0];
			unset($_SESSION['cart_contents']);
		}

	}