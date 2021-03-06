<?php

	require_once(EXTENSIONS . '/db_sync/lib/class.logquery.php');
	
	Class extension_db_sync extends Extension {
	
		public function about() {
			return array(
				'name'			=> 'Database Synchroniser',
				'version'		=> '0.8',
				'release-date'	=> '2010-05-10',
				'author'		=> array(
					'name'			=> 'Nick Dunn, Richard Warrender',
					'website'		=> 'http://airlock.com',
					'email'			=> 'nick.dunn@airlock.com'
				),
				'description'	=> 'Logs structural database changes to allow syncing between builds.'
			);
		}
		
		public function uninstall() {
			if (file_exists(MANIFEST . '/db_sync.sql')) unlink(MANIFEST . '/db_sync.sql');
		}
		
		public function install() {
			return true;
		}		
		
		public static function addToLogFile($line) {
			$logfile = MANIFEST . '/db_sync.sql';
			$handle = @fopen($logfile, 'a');
			fwrite($handle, $line);
			fclose($handle);			
		}
		
		/*
		public function getSubscribedDelegates(){
			return array(
						array(
							'page' => '/system/preferences/',
							'delegate' => 'AddCustomPreferenceFieldsets',
							'callback' => 'appendPreferences'
						),
					);
		}
		
		protected function __echoLog() {
			require_once(dirname(__FILE__) . '/lib/class.logviewer.php');
			$log = new LogViewer();
			$log->display(LogViewer::MODE_ECHO);
		}
		
		protected function __downloadSQL() {
			require_once(dirname(__FILE__) . '/lib/class.logviewer.php');
			$log = new LogViewer();
			$log->display(LogViewer::MODE_DOWNLOAD);
		}
		
		protected function __flushLog() {
			require_once(dirname(__FILE__) . '/lib/class.logviewer.php');
			$log = new LogViewer();
			$log->flush();
		}
		
		public function appendAssets($context){
			echo "Appending assets";
			exit;
		}
		
		public function appendPreferences($context){
			
			$context['parent']->Page->addScriptToHead(URL . '/extensions/db_sync/assets/ui-logic.js', 666);
			
			if(isset($_POST['action']['db_sync_echo'])){
				$this->__echoLog();
			}
			
			if(isset($_POST['action']['db_sync_flush'])){
				$this->__flushLog();
			}
			
			if(isset($_POST['action']['db_sync_download'])) {
				$this->__downloadSQL();
			}
			
			$group = new XMLElement('fieldset');
			$group->setAttribute('class', 'settings');
			
			// Sync flush
			$group->appendChild(new XMLElement('legend', 'DB Sync'));			
			$div = new XMLElement('div', NULL, array('id' => 'file-actions', 'class' => 'label'));			
			$span = new XMLElement('span');

			if(!extension_loaded('zlib')) {
				$span->appendChild(new XMLElement('p', '<strong>Warning: It appears you do not have the zlib extension available.'));
			}
			else{
				
				require_once(dirname(__FILE__) . '/lib/class.logviewer.php');
				$log = new LogViewer();
				
				$span->appendChild(new XMLElement('button', 'View log (' . $log->countQueries() . ')', array('name' => 'action[db_sync_echo]', 'type' => 'submit')));
				$span->appendChild(new XMLElement('button', 'Download SQL', array('name' => 'action[db_sync_download]', 'type' => 'submit')));
				$span->appendChild(new XMLElement('button', 'Flush Log', array('name' => 'action[db_sync_flush]', 'type' => 'submit')));
			}
			$div->appendChild($span);
			$group->appendChild(new XMLElement('p', 'Manage migration of structural database queries.', array('class' => 'help')));
			$group->appendChild($div);
			
			$context['wrapper']->appendChild($group);
						
		}*/
		

	}
	
?>