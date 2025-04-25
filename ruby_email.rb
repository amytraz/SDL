require 'mail'

# Set up SMTP settings
Mail.defaults do
  delivery_method :smtp, {
    address: 'smtp.gmail.com',
    port: 587,
    user_name: 'prajapatipawan604@gmail.com',
    password: 'gpsq lwcq xwfl mtlo', # Use your actual app password here
    authentication: :login,
    enable_starttls_auto: true
  }
end

# Define email message
message = Mail.new do
  from 'prajapatipawan604@gmail.com'
  to 'amytraz07@gmail.com'
  subject 'Hello from Ruby!'
  body 'This is a test email sent from Ruby.'
end

# Send email
message.deliver!
 #gem install mail , ruby main.rb
