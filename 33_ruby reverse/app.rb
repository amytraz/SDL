require 'sinatra'

# Method to reverse the name
def reverse_name(first_name, last_name)
  "#{last_name} #{first_name}"
end

get '/' do
  erb :index
end

post '/reverse' do
  first_name = params[:first_name]
  last_name = params[:last_name]
  @reversed_name = reverse_name(first_name, last_name)
  erb :reverse
end

# sudo apt-get install ruby-full
# sudo apt-get update -y
# sudo apt-get install -y ruby-sinatra to run ruby app.rb
