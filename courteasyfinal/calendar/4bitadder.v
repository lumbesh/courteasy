module adder(a0,a1,a2,a3,b0,b1,b2,b3,sum0,sum1,sum2,sum3);
input a0,a1,a2,a3,b0,b1,b2,b3;
output sum0,sum1,sum2,sum3;
wire c0,c1,c2,c3;

assign c0 = a0 & b0;
assign c1 = (a1 & b1) | (a1 & c0) | (b1 & c0);
assign c2 = (a2 & b2) | (a2 & c1) | (b2 & c1);
assign c3 = (a3 & b3) | (a3 & c2) | (b3 & c2);

assign sum0 = a0 ^ b0;
assign sum1 = a1 ^ b1 ^ c0;
assign sum2 = a2 ^ b2 ^ c1;
assign sum3 = a3 ^ b3 ^ c2;

endmodule

module TestBench;
reg a0,a1,a2,a3,b0,b1,b2,b3;
wire sum0,sum1,sum2,sum3;
initial
begin
$display("a[0] a[1] a[2] a[3] b[0] b[1] b[2] b[3] sum0 sum1 sum2 sum3 ");
a1=1'b0;
b1=1'b0; 
a0=1'b0; 
b0=1'b0;

a2=1'b0;
b2=1'b0; 
a3=1'b0; 
b3=1'b0;
#255 $finish;
end

always #128 a0 = ~a0;
always #64 a1 = ~a1;
always #32 a2 = ~a2;
always #16 a3 = ~a3;
always #8 b0 = ~b0;
always #4 b1 = ~b1;
always #2 b2 = ~b2;
always #1 b3 = ~b3;


adder U1(a0,a1,a2,a3,b0,b1,b2,b3,sum0,sum1,sum2,sum3);
initial
$monitor(" %b   %b    %b    %b    %b    %b    %b    %b    %b    %b    %b    %b    ",a0,a1,a2,a3,b0,b1,b2,b3,sum0,sum1,sum2,sum3);
endmodule