set :application, 'cooperativemda.ch'

set :stage, :production
set :branch, :master

set :deploy_to, -> { "/home/jminguely/www/#{fetch(:application)}" }

set :opcache_file_url, "https://cooperativemda.ch/opcache_clear.php"

# Extended Server Syntax
# ======================
server 'ssh-jminguely.alwaysdata.net', user: 'jminguely', roles: %w{web app db}

fetch(:default_env).merge!(wp_env: :production)

SSHKit.config.command_map[:composer] = "php #{shared_path.join("composer.phar")}"
